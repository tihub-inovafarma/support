<!--Inicio funcao copiar link-->
<script>
       function copyToClipboard(element) {
         var $temp = $("<input>");
         $("body").append($temp);
         $temp.val($(element).text()).select();
         document.execCommand("copy");
         $temp.remove();
       }
</script>






@if(config('adminlte.layout_topnav') or (isset($item['topnav']) && $item['topnav']))

  @if (isset($item['senhadia']) && $item['senhadia'])
	  
  <ul class="navbar-nav ml-auto">
<li class="nav-item  dropdown">
        

  <div class=class="col-lg-12 col-3">   
      <button type="button" class="btn btn-block btn-danger" onclick="copyToClipboard('#resultado')">
          <body onload="time()"></body>
          <div id="resultado">
      </button>
  </div>
      </li>	    
	  <li class="nav-item ">
  <div class=class="col-lg-12 col-3">
      <div class="dropdown">
          <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          &nbsp Versao 164.263
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <div id="165" style="display:none;">www.suporte.tihub.com.br/downloads/Versoes/inovafarma-1.64.263.exe</div>
               <div id="bkp" style="display:none;">www.suporte.tihub.com.br/downloads/Versoes/InovaFarmaService.msi</div>
            <a class="dropdown-item" onclick="copyToClipboard('#165')">Obter Link</a>
            <a class="dropdown-item" href="../../../downloads/Versoes/inovafarma-1.64.263.exe">Donwloads</a>
            <a class="dropdown-item" onclick="copyToClipboard('#bkp')">BKP Novo</a>
            <a class="dropdown-item" href="">Todas as Versoes</a>
         </div>
      </div>	  
  </div>
  
        </li>	

</ul>	



	  
  @elseif (is_array($item))
      <li @if (isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item {{ $item['top_nav_class'] }}">
          <a class="nav-link @if (isset($item['submenu']))dropdown-item dropdown-toggle @endif" href="{{ $item['href'] }}"
             @if (isset($item['submenu'])) data-toggle="dropdown" @endif
             @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
          >
              <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
  			{{ $item['text'] }}

              @if (isset($item['label']))
                  <span class="badge badge-{{ $item['label_color'] ?? 'primary' }}">{{ $item['label'] }}</span>
              @endif
          </a>
          @if (isset($item['submenu']))
              <ul class="dropdown-menu border-0 shadow">
                  @each('adminlte::partials.menu-item-sub-top-nav', $item['submenu'], 'item')
              </ul>
          @endif
      </li>
  @endif
@endif
<!--funcao soma senha dia-->
<script type="text/javascript">
  function time() {
    base = new Date();
    s = base.getDay();
    d = base.getDate();
    m = base.getMonth();
    a = base.getFullYear();

    diasemana = s + 1
    mes = m + 1
    soma1 = d * mes * a * diasemana
    document.getElementById('resultado').innerHTML = soma1;
  }
</script>