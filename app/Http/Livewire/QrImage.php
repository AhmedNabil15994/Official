<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QrImage extends Component
{   
    public $channel_id = 0;
    public $channel_token = 0;
    public $identifier = 0;
    public $days = 0;

    public function mount($id,$token,$identifier,$days)
    {
        $this->channel_id = $id;
        $this->channel_token = $token;
        $this->identifier = $identifier;
        $this->days = $days;
    }

    public function render(){    
        $data['url'] = asset('assets/images/qr-load.png');
        if($this->days == 0){
            return view('livewire.qr-image')->with('data',(object) $data);
        }

        $find = \Http::withHeaders([
            'Authorization' => 'Bearer '.$this->identifier,
            'CHANNELID' => $this->channel_id,
            'CHANNELTOKEN' => $this->channel_token,
        ])->get(config('app.ENGINE_URL').'instances/qr');
        $result = $find->json();

        if(isset($result['data'])){
            if($result['data']['qr'] != 'connected'){
                $data['url'] = $result['data']['qr'];
                $this->emit('statusChanged',[
                    'channelStatus' => 'got QR and ready to scan',
                    'image' => $result['data']['qr']
                ]); 
            }else if($result['data']['qr'] == 'connected'){
                $data['url'] = asset('assets/images/connected.png');
                $this->emit('statusChanged',[
                    'channelStatus' => 'connected',
                    'image' => asset('assets/images/connected.png'),
                ]); 
            }
        }        
        return view('livewire.qr-image')->with('data',(object) $data);
    }
}
