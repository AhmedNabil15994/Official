<?php

class ImageHelper {

   static function changeQR($data)
   {
       $save=false;

        $filepath= $data['qr'];
        $logopath= $data['logo'];


        $source = imagecreatefrompng( $filepath );  # QR-Code
        $logo = imagecreatefrompng( $logopath );    # Overlay

        $sw = intval( imagesx( $source ) );
        $sh = intval( imagesy( $source ) );
        $lw = intval( imagesx( $logo ) );
        $lh = intval( imagesy( $logo ) );




        /* Create a new image onto which we will copy images & assign transparency */
        $target = imagecreatetruecolor( $sw, $sh );
        imagesavealpha( $target , true );

        /* common divisor for overlay image size calculations */
        $divisor = 3;

        /* image size calculations */
        $clw = $sw / $divisor;      #   calculated width
        $scale = $lw / $clw;        #   calculated ratio
        $clh = $lh / $scale;        #   calculated height



        /* allocate a transparent colour for the new image */
        $transparent = imagecolorallocatealpha( $target, 0, 0, 0, 127 );
        imagefill( $target,0, 0, $transparent );



        /* copy the QR-Code to the new image */
        imagecopy( $target, $source, 0, 0, 0, 0, $sw, $sh );

        /* Determine position of overlay image using divisor */
        $px=$sw/$divisor;
        $py=$sh/$divisor;

        /* add the overlay */
        imagecopyresampled( $target, $logo, $px, $py, 0, 0, $clw, $clh, $lw, $lh );



        /* output or save image */
        // header( 'Content-Type: image/png' );
        ob_start();
        imagepng( $target, $save ? $filepath : null );
        $imagedata = ob_get_contents();
        ob_end_clean();


        /* clean up */
        imagedestroy( $target );
        imagedestroy( $source );
        imagedestroy( $logo );

        return "data:image/png;base64,".base64_encode($imagedata);

        
   }
}