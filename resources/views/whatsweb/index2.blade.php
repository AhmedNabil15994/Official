<html class="js serviceworker adownload cssanimations csstransitions webp exiforientation webp-alpha webp-animation webp-lossless" dir="LTR" loc="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>WhatsApp</title>
    <style>
      #initial_startup {
        --startup-background: #f0f2f5;
        --startup-background-rgb: 240, 242, 245;
        --startup-icon: #bbc5cb;
        --secondary-lighter: #8696a0;
        --primary-title: #41525d;
        --progress-primary: #00c298;
        --progress-background: #e9edef
      }

      .dark #initial_startup {
        --startup-background: #111b21;
        --startup-background-rgb: 17, 27, 33;
        --startup-icon: #676f73;
        --primary-title: rgba(233, 237, 239, 0.88);
        --secondary-lighter: #667781;
        --progress-primary: #0b846d;
        --progress-background: #233138
      }

      #app,
      body,
      html {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        overflow: hidden
      }

      #app {
        position: absolute;
        top: 0;
        left: 0
      }

      #initial_startup {
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        user-select: none;
        background-color: var(--startup-background)
      }

      #initial_startup .graphic {
        margin-top: -40px;
        color: var(--startup-icon)
      }

      #initial_startup .graphic .resume-logo {
        transform: translateX(calc(50% - 52px / 2))
      }

      #initial_startup .graphic::after {
        position: relative;
        top: -100%;
        left: calc(50% - 72px * 2 - 72px / 2);
        display: block;
        width: calc(72px * 3);
        height: 100%;
        content: '';
        background: linear-gradient(to right, rgba(var(--startup-background-rgb), .5) 0, rgba(var(--startup-background-rgb), .5) 33.33%, rgba(var(--startup-background-rgb), 0) 44.1%, rgba(var(--startup-background-rgb), 0) 55.8%, rgba(var(--startup-background-rgb), .5) 66.66%, rgba(var(--startup-background-rgb), .5) 100%);
        opacity: 1;
        animation: shimmer 1.5s linear .6s infinite
      }

      html[dir=rtl] #initial_startup .graphic::after {
        animation-direction: reverse
      }

      @keyframes shimmer {
        from {
          left: calc(50% - 72px * 2 - 72px / 2)
        }

        to {
          left: calc(50% - 72px / 2)
        }
      }

      #initial_startup .progress {
        position: relative;
        width: 420px;
        height: 3px;
        margin-top: 40px
      }

      #initial_startup .progress progress {
        vertical-align: top
      }

      #initial_startup .main {
        margin-top: 40px;
        font-size: 17px;
        color: var(--primary-title)
      }

      #initial_startup .secondary {
        margin-top: 12px;
        font-size: 14px;
        color: var(--secondary-lighter)
      }

      #initial_startup .secondary span {
        display: inline-block;
        margin-bottom: 2px;
        vertical-align: middle
      }

      progress {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 3px;
        margin: 0;
        color: var(--progress-primary);
        background-color: var(--progress-background);
        border: none
      }

      progress[value]::-webkit-progress-bar {
        background-color: var(--progress-background)
      }

      progress[value]::-moz-progress-bar,
      progress[value]::-webkit-progress-value {
        background-color: var(--progress-primary);
        transition: width .45s ease
      }
    </style>
    <link href="{{asset('assets/whatsweb/style.css')}}" rel="stylesheet">
      <link href="{{asset('assets/whatsweb/bootstrap.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/assets/whatsweb/bootstrap-main.css')}}">
    <style id="asset-style" type="text/css"></style>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/whatsweb/lazy1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/whatsweb/lazy2.css')}}">
  </head>
  <body class="web">     
    <div id="app">
      <div class="_1ADa8 _3Nsgw app-wrapper-web font-fix">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div tabindex="-1" class="_1XkO3 two _22rDB">
          <div class="snyj76hw an6tjemt jbm6vef4 bbl9m3t3 ora14ekb nv3qcefw"></div>
          <div class="_3ArsE">
            <div class="ldL67 _2i3T7 _1cpSb" data-testid="drawer-left">
              <span class="lhggkp7q qq0sjtgm ebjesfe0 jxacihee tkdu00h0"></span>
            </div>
            <div class="ldL67 _3sh5K" data-testid="drawer-middle">
              <span class="lhggkp7q qq0sjtgm ebjesfe0 jxacihee tkdu00h0"></span>
            </div>
          </div>
          <div class="ldL67 _2i3T7">
            <header data-testid="chatlist-header" class="g0rxnol2 ercejckq cm280p3y p357zi0d gndfcl4n kcgo1i74 ln8gz9je e8h85j61 emrlamx0 aiput80m lyvj5e2u l9g3jx6n f6ipylw5">
              <div class="YtmXM">
                <div class="_3GlyB" style="height: 40px; width: 40px; cursor: pointer;">
                  <img src="https://pps.whatsapp.net/v/t61.24694-24/307733494_133444572774959_6285646928270256220_n.jpg?stp=dst-jpg_s96x96&amp;ccb=11-4&amp;oh=01_AVyg5ocYQP_VrxpHfCJ4g5DY8a02f9pm_t-TMCDQ7Cof4A&amp;oe=634D4A40" alt="" draggable="false" class="_8hzr9 M0JmA i0jNr" style="visibility: visible;">
                </div>
              </div>
              <div class="_3yZPA">
                <div class="_1QVfy _3UaCz">
                  <span class="">
                    <span></span>
                    <div class="_2cNrC" data-testid="menu-bar-status">
                      <div aria-disabled="false" role="button" tabindex="0" class="_26lC3" data-tab="2" title="Status" aria-label="Status">
                        <span data-testid="status-v3-unread" data-icon="status-v3-unread" class="">
                          <svg version="1.1" id="df9d3429-f0ef-48b5-b5eb-f9d27b2deba6" x="0" y="0" viewBox="0 0 24 24" width="24" height="24" class="">
                            <path fill="currentColor" d="M12.072 1.761a10.05 10.05 0 0 0-9.303 5.65.977.977 0 0 0 1.756.855 8.098 8.098 0 0 1 7.496-4.553.977.977 0 1 0 .051-1.952zM1.926 13.64a10.052 10.052 0 0 0 7.461 7.925.977.977 0 0 0 .471-1.895 8.097 8.097 0 0 1-6.012-6.386.977.977 0 0 0-1.92.356zm13.729 7.454a10.053 10.053 0 0 0 6.201-8.946.976.976 0 1 0-1.951-.081v.014a8.097 8.097 0 0 1-4.997 7.209.977.977 0 0 0 .727 1.813l.02-.009z"></path>
                            <path fill="#009588" d="M19 1.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"></path>
                          </svg>
                        </span>
                      </div>
                      <span></span>
                    </div>
                    <div class="_2cNrC" data-testid="menu-bar-chat">
                      <div aria-disabled="false" role="button" tabindex="0" class="_26lC3" data-tab="2" title="New chat" aria-label="New chat">
                        <span data-testid="chat" data-icon="chat" class="">
                          <svg viewBox="0 0 24 24" width="24" height="24" class="">
                            <path fill="currentColor" d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z"></path>
                          </svg>
                        </span>
                      </div>
                      <span></span>
                    </div>
                    <div class="_2cNrC" data-testid="menu-bar-menu">
                      <div aria-disabled="false" role="button" tabindex="0" class="_26lC3" data-tab="2" title="Menu" aria-label="Menu">
                        <span data-testid="menu" data-icon="menu" class="">
                          <svg viewBox="0 0 24 24" width="24" height="24" class="">
                            <path fill="currentColor" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path>
                          </svg>
                        </span>
                      </div>
                      <span></span>
                    </div>
                  </span>
                </div>
              </div>
            </header>
            <span class="_3z9_h">
              <div class="_2XcXo">
                <div class="_22XJC _2C_7j">
                  <div class="_384go _1-SiY">
                    <span data-testid="alert-notification" data-icon="alert-notification" class="">
                      <svg viewBox="0 0 48 48" width="48" height="48" class="">
                        <path fill="currentColor" d="M24.154 2C11.919 2 2 11.924 2 24.165S11.919 46.33 24.154 46.33s22.154-9.924 22.154-22.165S36.389 2 24.154 2zm-.744 15.428v-.618c0-.706.618-1.324 1.324-1.324s1.323.618 1.323 1.324v.618c2.559.618 4.412 2.823 4.412 5.559v3.176l-8.294-8.294a5.056 5.056 0 0 1 1.235-.441zm1.323 15.706a1.77 1.77 0 0 1-1.765-1.765h3.529a1.768 1.768 0 0 1-1.764 1.765zm7.236-.883-1.765-1.765H17.233v-.882l1.765-1.765v-4.853a5.56 5.56 0 0 1 .794-2.912l-2.559-2.559 1.147-1.147 14.735 14.736-1.146 1.147z"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="_1Yy79 _1-SiY">
                    <div class="_2z7gr">Get notified of new messages</div>
                    <div class="_2BxMU">
                      <span class="f804f6gw">
                        <button class="i5tg98hk f9ovudaz przvwfww gx1rr48f shdiholb phqmzxqs gtscxtjd ajgl1lbb thr4l2wc cc8mgx9x eta5aym1 d9802myq e4xiuwjv" type="button">
                          <span class="edeob0r2 t94efhq2">Turn on desktop notifications</span>
                        </button>
                        <span data-testid="chevron-right-text" data-icon="chevron-right-text" class="l7jjieqr hymafltn k6y3xtnu fewfhwl7">
                          <svg viewBox="0 0 8 12" width="8" height="12" class="">
                            <path fill="currentColor" d="m2.173 1 4.584 4.725-4.615 4.615-1.103-1.103 3.512-3.512L1 2.173 2.173 1z"></path>
                          </svg>
                        </span>
                      </span>
                    </div>
                  </div>
                  <div class="_3UDm1">
                    <button class="i5tg98hk f9ovudaz przvwfww gx1rr48f shdiholb phqmzxqs gtscxtjd ajgl1lbb thr4l2wc cc8mgx9x eta5aym1 d9802myq e4xiuwjv" type="button" aria-label="Close">
                      <span data-testid="x" data-icon="x" class="_1K1wg">
                        <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24" class="">
                          <path d="m19.1 17.2-5.3-5.3 5.3-5.3-1.8-1.8-5.3 5.4-5.3-5.3-1.8 1.7 5.3 5.3-5.3 5.3L6.7 19l5.3-5.3 5.3 5.3 1.8-1.8z"></path>
                        </svg>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
            </span>
            <div id="side" class="_1KDb8">
              <div tabindex="-1" class="uwk68">
                <div class="_3yWey _18wEy" data-testid="chat-list-search-container">
                  <div class="tKJAr">
                    <button data-testid="icon-search-morph" class="_28-cz _1lbUg" aria-label="Search or start new chat">
                      <div class="_1KJ7A _2nifA">
                        <span data-testid="back" data-icon="back" class="">
                          <svg viewBox="0 0 24 24" width="24" height="24" class="">
                            <path fill="currentColor" d="m12 4 1.4 1.4L7.8 11H20v2H7.8l5.6 5.6L12 20l-8-8 8-8z"></path>
                          </svg>
                        </span>
                      </div>
                      <div class="_1KJ7A bHvlO">
                        <span data-testid="search" data-icon="search" class="">
                          <svg viewBox="0 0 24 24" width="24" height="24" class="">
                            <path fill="currentColor" d="M15.009 13.805h-.636l-.22-.219a5.184 5.184 0 0 0 1.256-3.386 5.207 5.207 0 1 0-5.207 5.208 5.183 5.183 0 0 0 3.385-1.255l.221.22v.635l4.004 3.999 1.194-1.195-3.997-4.007zm-4.808 0a3.605 3.605 0 1 1 0-7.21 3.605 3.605 0 0 1 0 7.21z"></path>
                          </svg>
                        </span>
                      </div>
                    </button>
                    <span></span>
                    <div data-testid="input-placeholder" class="_3Qnsr">Search or start new chat</div>
                    <div class="_16C8p">
                      <div tabindex="-1" class="_1UWac _3hKpJ">
                        <div data-testid="pluggable-input-placeholder" class="_2vbn4" style="visibility: visible;"></div>
                        <div data-testid="chat-list-search" title="Search input textbox" role="textbox" class="_13NKt copyable-text selectable-text" contenteditable="true" data-tab="3" dir="ltr"></div>
                      </div>
                    </div>
                  </div>
                  <button data-tab="4" aria-label="Chat filters menu" title="Chat filters menu" class="tt8xd2xn bugiwsl0 mpdn4nr2 fooq7fky">
                    <div class="p357zi0d ktfrpxia nu7pwgvd ac2vgrno sap93d0t gndfcl4n ekdr8vow dhq51u3o s4k44ver g9p5wyxn i0tg5vk9 aoogvgrq o2zu3hjb">
                      <span data-testid="filter" data-icon="filter" class="">
                        <svg viewBox="0 0 24 24" width="20" height="20" preserveAspectRatio="xMidYMid meet" class="">
                          <path fill="currentColor" d="M10 18.1h4v-2h-4v2zm-7-12v2h18v-2H3zm3 7h12v-2H6v2z"></path>
                        </svg>
                      </span>
                    </div>
                  </button>
                </div>
              </div>
              <div class="_3Bc7H _20c87" id="pane-side">
                <div tabindex="-1" data-tab="4">
                  <div class="" data-testid="chat-list">
                    <div aria-label="Chat list" class="_3uIPm WYyr1" role="grid" aria-rowcount="15" style="height: 1080px;">
                        <div class="lhggkp7q ln8gz9je rx9719la" style="z-index: 14; transition: none 0s ease 0s; height: 72px;">
                          <div class="_1Oe6M">
                            <div tabindex="-1" aria-selected="false" role="row">
                              <div data-testid="cell-frame-container" class="_2nY6U vq6sj">
                                <div class="_2EU3r">
                                  <div class="HONz8">
                                    <div class="_3GlyB" style="height: 49px; width: 49px;">
                                      <img src="https://pps.whatsapp.net/v/t61.24694-24/301991596_657406035809415_3899513341680550369_n.jpg?stp=dst-jpg_s96x96&amp;ccb=11-4&amp;oh=01_AVy544i4aq91Y9cyXpNEw_Yu3AYQI5Ex8Ati_Z0mo_kYoA&amp;oe=634D4D28" alt="" draggable="false" class="_8hzr9 M0JmA i0jNr" style="visibility: visible;">
                                    </div>
                                  </div>
                                </div>
                                <div class="_3OvU8">
                                  <div role="gridcell" aria-colindex="2" class="_3vPI2">
                                    <div class="zoWT4">
                                      <span class="_3q9s6">
                                        <span dir="auto" title="ay 7aga" class="ggj6brxn gfz4du6o r7fjleex g0rxnol2 lhj4utae le5p0ye3 l7jjieqr i0jNr">ay 7aga</span>
                                        <div class="_3dulN"></div>
                                      </span>
                                    </div>
                                    <div class="_1i_wG">Tuesday</div>
                                  </div>
                                  <div class="_37FrU">
                                    <div class="_1qB8f">
                                      <span class="Hy9nV" title="&#x202B;انا لسه 😂&#x202C;" data-testid="last-msg-status">
                                        <div class="_2qo4q _3NIfV">
                                          <span data-testid="status-dblcheck" data-icon="status-dblcheck" class="">
                                            <svg viewBox="0 0 18 18" width="18" height="18" class="">
                                              <path fill="currentColor" d="m17.394 5.035-.57-.444a.434.434 0 0 0-.609.076l-6.39 8.198a.38.38 0 0 1-.577.039l-.427-.388a.381.381 0 0 0-.578.038l-.451.576a.497.497 0 0 0 .043.645l1.575 1.51a.38.38 0 0 0 .577-.039l7.483-9.602a.436.436 0 0 0-.076-.609zm-4.892 0-.57-.444a.434.434 0 0 0-.609.076l-6.39 8.198a.38.38 0 0 1-.577.039l-2.614-2.556a.435.435 0 0 0-.614.007l-.505.516a.435.435 0 0 0 .007.614l3.887 3.8a.38.38 0 0 0 .577-.039l7.483-9.602a.435.435 0 0 0-.075-.609z"></path>
                                            </svg>
                                          </span>
                                        </div>
                                        <span dir="auto" class="l7jjieqr i0jNr">You</span>
                                        <span>:&nbsp;</span>
                                        <span dir="rtl" class="ggj6brxn gfz4du6o r7fjleex g0rxnol2 lhj4utae le5p0ye3 f804f6gw ln8gz9je i0jNr">انا لسه 😂
                                        </span>
                                      </span>
                                    </div>
                                    <div role="gridcell" aria-colindex="1" class="_1i_wG">
                                      <span></span>
                                      <span></span>
                                      <span></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ldL67 _3sh5K">
            <div class="zaKsw">
              <div class="_1RAKT">
                <div class="WM0_u" style="opacity: 1;">
                  <span data-testid="intro-md-beta-logo-light" data-icon="intro-md-beta-logo-light" class="IVxyB">
                    <svg width="360" viewBox="0 0 303 172" fill="none" preserveAspectRatio="xMidYMid meet" class="">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M229.565 160.229c32.647-10.984 57.366-41.988 53.825-86.81-5.381-68.1-71.025-84.993-111.918-64.932C115.998 35.7 108.972 40.16 69.239 40.16c-29.594 0-59.726 14.254-63.492 52.791-2.73 27.933 8.252 52.315 48.89 64.764 73.962 22.657 143.38 13.128 174.928 2.513Z" fill="#DAF7F3"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M131.589 68.942h.01c6.261 0 11.336-5.263 11.336-11.756S137.86 45.43 131.599 45.43c-5.081 0-9.381 3.466-10.822 8.242a7.302 7.302 0 0 0-2.404-.405c-4.174 0-7.558 3.51-7.558 7.838s3.384 7.837 7.558 7.837h13.216ZM105.682 128.716c3.504 0 6.344-2.808 6.344-6.27 0-3.463-2.84-6.27-6.344-6.27-1.156 0-2.24.305-3.173.839v-.056c0-6.492-5.326-11.756-11.896-11.756-5.29 0-9.775 3.413-11.32 8.132a8.025 8.025 0 0 0-2.163-.294c-4.38 0-7.93 3.509-7.93 7.837 0 4.329 3.55 7.838 7.93 7.838h28.552Z" fill="#fff"></path>
                      <rect x=".445" y=".55" width="50.58" height="100.068" rx="7.5" transform="rotate(6 -391.775 121.507) skewX(.036)" fill="#42CBA5" stroke="#316474"></rect>
                      <rect x=".445" y=".55" width="50.403" height="99.722" rx="7.5" transform="rotate(6 -356.664 123.217) skewX(.036)" fill="#fff" stroke="#316474"></rect>
                      <path d="m57.16 51.735-8.568 82.024a5.495 5.495 0 0 1-6.042 4.895l-32.97-3.465a5.504 5.504 0 0 1-4.897-6.045l8.569-82.024a5.496 5.496 0 0 1 6.041-4.895l5.259.553 22.452 2.36 5.259.552a5.504 5.504 0 0 1 4.898 6.045Z" fill="#EEFEFA" stroke="#316474"></path>
                      <path d="M26.2 102.937c.863.082 1.732.182 2.602.273.238-2.178.469-4.366.69-6.546l-2.61-.274c-.238 2.178-.477 4.365-.681 6.547Zm-2.73-9.608 2.27-1.833 1.837 2.264 1.135-.917-1.838-2.266 2.27-1.833-.92-1.133-2.269 1.834-1.837-2.264-1.136.916 1.839 2.265-2.27 1.835.92 1.132Zm-.816 5.286c-.128 1.3-.265 2.6-.41 3.899.877.109 1.748.183 2.626.284.146-1.31.275-2.614.413-3.925-.878-.092-1.753-.218-2.629-.258Zm16.848-8.837c-.506 4.801-1.019 9.593-1.516 14.396.88.083 1.748.192 2.628.267.496-4.794 1-9.578 1.513-14.37-.864-.143-1.747-.192-2.625-.293Zm-4.264 2.668c-.389 3.772-.803 7.541-1.183 11.314.87.091 1.74.174 2.601.273.447-3.912.826-7.84 1.255-11.755-.855-.15-1.731-.181-2.589-.306-.04.156-.069.314-.084.474Zm-4.132 1.736c-.043.159-.06.329-.077.49-.297 2.896-.617 5.78-.905 8.676l2.61.274c.124-1.02.214-2.035.33-3.055.197-2.036.455-4.075.627-6.115-.863-.08-1.724-.17-2.585-.27Z" fill="#316474"></path>
                      <path d="M17.892 48.489a1.652 1.652 0 0 0 1.468 1.803 1.65 1.65 0 0 0 1.82-1.459 1.652 1.652 0 0 0-1.468-1.803 1.65 1.65 0 0 0-1.82 1.459ZM231.807 136.678l-33.863 2.362c-.294.02-.54-.02-.695-.08a.472.472 0 0 1-.089-.042l-.704-10.042a.61.61 0 0 1 .082-.054c.145-.081.383-.154.677-.175l33.863-2.362c.294-.02.54.02.695.08.041.016.069.03.088.042l.705 10.042a.61.61 0 0 1-.082.054 1.678 1.678 0 0 1-.677.175Z" fill="#fff" stroke="#316474"></path>
                      <path d="m283.734 125.679-138.87 9.684c-2.87.2-5.371-1.963-5.571-4.823l-6.234-88.905c-.201-2.86 1.972-5.35 4.844-5.55l138.87-9.684c2.874-.2 5.371 1.963 5.572 4.823l6.233 88.905c.201 2.86-1.971 5.349-4.844 5.55Z" fill="#fff"></path>
                      <path d="M144.864 135.363c-2.87.2-5.371-1.963-5.571-4.823l-6.234-88.905c-.201-2.86 1.972-5.35 4.844-5.55l138.87-9.684c2.874-.2 5.371 1.963 5.572 4.823l6.233 88.905c.201 2.86-1.971 5.349-4.844 5.55" stroke="#316474"></path>
                      <path d="m278.565 121.405-129.885 9.058c-2.424.169-4.506-1.602-4.668-3.913l-5.669-80.855c-.162-2.31 1.651-4.354 4.076-4.523l129.885-9.058c2.427-.169 4.506 1.603 4.668 3.913l5.669 80.855c.162 2.311-1.649 4.354-4.076 4.523Z" fill="#EEFEFA" stroke="#316474"></path>
                      <path d="m230.198 129.97 68.493-4.777.42 5.996c.055.781-.098 1.478-.363 1.972-.27.5-.611.726-.923.748l-165.031 11.509c-.312.022-.681-.155-1.017-.613-.332-.452-.581-1.121-.636-1.902l-.42-5.996 68.494-4.776c.261.79.652 1.483 1.142 1.998.572.6 1.308.986 2.125.929l24.889-1.736c.817-.057 1.491-.54 1.974-1.214.413-.577.705-1.318.853-2.138Z" fill="#42CBA5" stroke="#316474"></path>
                      <path d="m230.367 129.051 69.908-4.876.258 3.676a1.51 1.51 0 0 1-1.403 1.61l-168.272 11.735a1.51 1.51 0 0 1-1.613-1.399l-.258-3.676 69.909-4.876a3.323 3.323 0 0 0 3.188 1.806l25.378-1.77a3.32 3.32 0 0 0 2.905-2.23Z" fill="#fff" stroke="#316474"></path>
                      <circle transform="rotate(-3.989 1304.861 -2982.552) skewX(.021)" fill="#42CBA5" stroke="#316474" r="15.997"></circle>
                      <path d="m208.184 87.11-3.407-2.75-.001-.002a1.952 1.952 0 0 0-2.715.25 1.89 1.89 0 0 0 .249 2.692l.002.001 5.077 4.11v.001a1.95 1.95 0 0 0 2.853-.433l8.041-12.209a1.892 1.892 0 0 0-.573-2.643 1.95 1.95 0 0 0-2.667.567l-6.859 10.415Z" fill="#fff" stroke="#316474"></path>
                    </svg>
                  </span>
                </div>
                <div class="_3q5qB" style="opacity: 1;">
                  <div class="_1vjYt">
                    <h1 data-testid="intro-title">WhatsApp Web</h1>
                  </div>
                  <div data-testid="intro-text" class="_1y6Yk">Send and receive messages without keeping your phone online. <br>Use WhatsApp on up to 4 linked devices and 1 phone at the same time. </div>
                </div>
                <div class="_2v0ig">
                  <span data-testid="lock-small" data-icon="lock-small" class="">
                    <svg width="10" height="12" viewBox="0 0 10 12" class="">
                      <path d="M5.008 1.6c1.375 0 2.501 1.074 2.586 2.427l.005.164v1.271h.158c.585 0 1.059.48 1.059 1.07v3.351c0 .59-.474 1.07-1.059 1.07h-5.5c-.582 0-1.057-.48-1.057-1.07V6.531c0-.59.474-1.069 1.058-1.069h.158V4.191c0-1.375 1.075-2.501 2.429-2.586l.163-.005Zm0 1.248c-.696 0-1.272.534-1.337 1.214l-.006.129-.002 1.271H6.35l.001-1.271c0-.653-.47-1.2-1.088-1.319l-.126-.018-.129-.006Z" fill="currentColor"></path>
                    </svg>
                  </span> End-to-end encrypted
                </div>
              </div>
            </div>
          </div>
          <div class="ldL67 _1bLj8" data-testid="drawer-right">
            <span class="lhggkp7q qq0sjtgm ebjesfe0 jxacihee tkdu00h0"></span>
          </div>
        </div>
      </div>
    </div>
    <div id="hard_expire_time" data-time="1679523695.916"></div>
    
   
  </body>
</html>