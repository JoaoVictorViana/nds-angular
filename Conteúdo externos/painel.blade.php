<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Banco Central IFCE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}"/>
        <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />   
        <link rel="stylesheet" type="text/css" href="{{ asset('css/painel.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.semanticui.min.css') }}" />
        <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script type="text/javascript" src="{{ asset('js/semantic.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/moment.min.js') }}" ></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.semanticui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/painel.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2.all.min.js') }}" ></script>
        <script type="text/javascript" src="https://momentjs.com/downloads/moment.min.js" ></script>
        <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js" ></script>
        <script
            src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js">
        </script>
        
    </head>
    <body>
        
        <!--        <div class="ui active inverted dimmer" id="loader">
                    <div class="ui large text loader">Carregando...</div>
                </div>-->
    <div id="teste1">
        {{-- INICIO MENU MOBILE --}}
        <div class="ui grid">
            <div class="mobile only row">
                <div class="ui sidebar vertical left menu overlay visible very thin icon" style="-webkit-transition-duration: 0.1s; overflow:visible !important; overflow-y: auto !important; background-color: #006D44 !important;" id="sidebarMobile">
                    <div class="item logo">
                        <img src="{{ url('img/logo_banco_central.png') }}"  style="display: none" id="imgBig"/>
                        <img src="{{ url('img/logo_banco_central.png') }}" id="imgSmall" />
                    </div>
                    <div class="ui accordion displaynone">
                        <a class="item notContent" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a> 
                        <a class="item notContent" id="paginaInicial">
                            <p class="pTitle"><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>
                        
                        <!-- INICIO MENU ABERTO COMPLETO -->
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                 <a class="item notContent" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="icon {{$item->icone}}" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span></p>
                                </a>
                            @else
                                <a class="title item" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="{{$item->icone}} icon" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                                </a>
                                <div class="content" id="{{$item->nomePermissao}}">
                                    @php
                                        $subMenu = explode(', ', $item->itensMenu);
                                        $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                        $countRota = 0;
                                    @endphp
                                    @foreach ($subMenu as $itemSubMenu)
                                        <a class="item itemNotInSubMenu notContent" id="{{$rotaSubMenu[$countRota ++]}}" href="javascript:void(0);"><span>{{$itemSubMenu}}</span></a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                        <!-- FIM MENU ABERTO COMPLETO -->

                    </div>
                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item" id="dropdownToOneIcon">
                            <z class="displaynone">Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>
                        <div class="ui dropdown item" id="dropdownToOneIcon">
                            <z class="displaynone">Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>
                        {{-- INICIO MENU FECHADO COMPLETO --}}
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                <div class="ui dropdown item" id="dropdownToOneIcon">
                                    <z class="displaynone">{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->rotaItensMenu}}"></i>
                                </div>
                            @else
                                <div class="ui dropdown link item" id="dropdownToOneIcon">
                                    <z class="displaynone">{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->nomePermissao}}"></i>
                                    <div class="menu {{$item->nomePermissao}}" id="dropwdownIcones">
                                        <div class="header">
                                            {{$item->descricacao}}
                                        </div>
                                        <div class="ui divider"></div>
                                        @php
                                            $subMenu = explode(', ', $item->itensMenu);
                                            $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                            $countRota = 0;
                                        @endphp
                                        @foreach ($subMenu as $itemSubMenu)
                                            <a class="item" href="javascript:void(0);">{{$itemSubMenu}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- FIM MENU FECHADO COMPLETO --}}

                    </div>
                </div>
            </div>
            {{-- FIM MENU MOBILE --}}

            {{-- INICIO MENU COMPUTADOR --}}
            <div class="computer only row">
                
                <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow-y: scroll !important; background-color: #006D44 !important;" id="sidebarPC">
                    <div class="item logo">
                        <img src="{{ url('img/ifce.png') }}"  style="display: none; width: 100% !important" id="imgBig"/>
                        <img src="{{ url('img/logo_banco_central.png') }}" id="imgSmall" />
                    </div>
                    <div class="ui accordion">
                        <a class="item notContent" id="intranet" href="https://intranet.maracanau.ifce.edu.br/">
                        <p class="pTitle">&nbsp;<img src="{{ url('img/intra_bola_branca.png') }}" width="7.5%" > <span id="textDrop">&nbsp;Intranet</span></p>
                        </a>
                        <a class="item notContent" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a>
                        <a class="item notContent " id="paginaInicial">
                            <p class="pTitle "><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>
                        

                        <!-- INICIO MENU ABERTO COMPLETO -->
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                 <a class="item notContent" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="icon {{$item->icone}}" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span></p>
                                </a>
                            @else
                                <a class="title item {{ (request()->is($item->nomePermissao.'/'.'*')) ? ' active' : '' }}" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="{{$item->icone}} icon" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                                </a>
                                <div class="content {{ (request()->is($item->nomePermissao.'/'.'*')) ? ' active' : '' }}" id="{{$item->nomePermissao}}">
                                    @php
                                        $subMenu = explode(', ', $item->itensMenu);
                                        $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                        $countRota = 0;
                                    @endphp
                                    @foreach ($subMenu as $itemSubMenu)
                                        <a class="item itemNotInSubMenu notContent {{ (request()->is($item->nomePermissao.'/'.$rotaSubMenu[$countRota].'*')) ? ' active' : '' }}" id="{{$rotaSubMenu[$countRota++]}}" href="javascript:void(0);"><span>{{$itemSubMenu}}</span></a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                        <!-- FIM MENU ABERTO COMPLETO -->
                    </div>

                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>
                        

                        {{-- INICIO MENU FECHADO COMPLETO --}}
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                                    <z>{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->rotaItensMenu}}"></i>
                                </div>
                            @else
                                <div class="ui dropdown link item displaynone" id="dropdownToOneIcon">
                                    <z>{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->nomePermissao}}"></i>
                                    <div class="menu {{$item->nomePermissao}}" id="dropwdownIcones">
                                        <div class="header">
                                            {{$item->descricacao}}
                                        </div>
                                        <div class="ui divider"></div>
                                        @php
                                            $subMenu = explode(', ', $item->itensMenu);
                                            $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                            $countRota = 0;
                                        @endphp
                                        @foreach ($subMenu as $itemSubMenu)
                                            <a class="item" href="javascript:void(0);">{{$itemSubMenu}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- FIM MENU FECHADO COMPLETO --}}
                    </div>
                </div>
            </div>
            {{-- FIM MENU COMPUTADOR --}}

            {{-- INICIO MENU TABLET --}}
            <div class="tablet only row">
                <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow: visible !important; background-color: #006D44 !important;" id="sidebarTablet">
                    <div class="item logo">
                        <img src="{{ url('img/ifce.png') }}"  style="display: none; width: 100% !important;" id="imgBig"/>
                        <img src="{{ url('img/logo_banco_central.png') }}" id="imgSmall" />
                    </div>
                    <div class="ui accordion">
                        <a class="item notContent" id="paginaInicial">
                            <p class="pTitle"><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>
                        <a class="item notContent" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a>
                        <!-- INICIO MENU ABERTO COMPLETO -->
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                 <a class="item notContent" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="icon {{$item->icone}}" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span></p>
                                </a>
                            @else
                                <a class="title item" id="{{$item->nomePermissao}}">
                                    <p class="pTitle"><i class="{{$item->icone}} icon" id="iconSidebar"></i> <span id="textDrop">{{$item->descricacao}}</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                                </a>
                                <div class="content" id="{{$item->nomePermissao}}">
                                    @php
                                        $subMenu = explode(', ', $item->itensMenu);
                                        $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                        $countRota = 0;
                                    @endphp
                                    @foreach ($subMenu as $itemSubMenu)
                                        <a class="item itemNotInSubMenu notContent" id="{{$rotaSubMenu[$countRota ++]}}" href="javascript:void(0);"><span>{{$itemSubMenu}}</span></a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                        <!-- FIM MENU ABERTO COMPLETO -->
                    </div>
                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>
                        {{-- INICIO MENU FECHADO COMPLETO --}}
                        @foreach ($permissions as $item)
                            @if ($item->itensMenu == null)
                                <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                                    <z>{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->rotaItensMenu}}"></i>
                                </div>
                            @else
                                <div class="ui dropdown link item displaynone" id="dropdownToOneIcon">
                                    <z>{{$item->descricacao}}</z>
                                    <i class="{{$item->icone}} icon" id="{{$item->nomePermissao}}"></i>
                                    <div class="menu {{$item->nomePermissao}}" id="dropwdownIcones">
                                        <div class="header">
                                            {{$item->descricacao}}
                                        </div>
                                        <div class="ui divider"></div>
                                        @php
                                            $subMenu = explode(', ', $item->itensMenu);
                                            $rotaSubMenu = explode(', ', $item->rotaItensMenu);
                                            $countRota = 0;
                                        @endphp
                                        @foreach ($subMenu as $itemSubMenu)
                                            <a class="item" href="javascript:void(0);">{{$itemSubMenu}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- FIM MENU FECHADO COMPLETO --}}

                    </div>
                </div>
            </div>
        </div>
        {{-- FIM MENU TABLET --}}
        <div class="pusher">
            <div class="ui fixed menu asd borderless" style="" id="navbarSistema">
                <div class="ui grid">
                    <div class="computer only row">
                        <a class="item openbtn">
                            <i class="icon content"></i>
                        </a>
                    </div>
                    <div class="mobile only row">
                        <a class="item openbtnmobile">
                            <i class="icon content"></i>
                        </a>
                    </div>
                    <div class="tablet only row">
                        <a class="item openbtntablet">
                            <i class="icon content"></i>
                        </a>
                    </div>
                </div>
                <div class="right menu" id="iconesNavbar">
                    <div class="ui grid">
                        <div class="computer only row">
                            <a class="item">
                                <i class="th icon big" id="system"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="item">
                                <i class="bell icon big" id="notifications"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="item">
                                <i class="user icon big" id="informationsUser"></i>
                                <!--<img class="ui avatar image openDivNone" id="informationsUser" src="img/user.png" style="cursor: pointer;">-->
                            </a>
                            &nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="ui popup bottom left transition hidden" id="popUpSystem">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <ul class="ulGeral" id="system">
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li> <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Pop Up para sistemas -->
                    <div class="ui popup bottom left transition hidden" id="popUpNotifications">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <div class="ui comments" id="commentsNotifications">
                                    <h3 class="ui dividing header">Notificações</h3>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Pop Up para sistemas -->
                    <div class="ui popup bottom left transition hidden" id="popUpInformationUser">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <div class="ui cards">
                                    <div class="card"  id="cardUser">
                                        <div class="content">
                                            <img class="right floated mini ui image" src="img/matt.jpg">
                                            <div class="header">
                                                {{Auth::user()->nome}}
                                            </div>
                                            <div class="meta">
                                                Administrador
                                            </div>
                                            <div class="description">
                                                @php
                                                    $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
                                                    $acesso = DB::table('attempt_at')->where('user_id', Auth::user()->pessoa_id)->get();
                                                    if(!isset($acesso)){
                                                        $diasemana_numero = date('w', time($acesso[0]->updated_at));
                                                    } else {
                                                        $diasemana_numero = date('w',time());
                                                    }
                                                @endphp
                                                Último acesso: {{ $diasemana[$diasemana_numero].', '.$acesso[0]->updated_at }}
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <div class="ui two buttons">
                                                <div class="ui basic green button">Conta</div>
                                                <div class="ui basic red button" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
 document.getElementById('logout-form').submit();">{{ __('Sair') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="ui container containerPrincipal segment" id="containerToInformations"> 
            </div>
        </div>
    </div>
    </body>
</html>
