		<p id="floating-button-hider" class="pointer-opaq tooltipped" style="position:absolute;top:-15px;left:0px;background:#d5691f;padding:1.5px 2.4px;opacity:0.3;" data-tooltip="Masquer Le Quick Menu" data-delay='5s' data-position="bottom">
			<i class="ion-chevron-left white-text small"></i>
		</p>


  <div class="fixed-action-btn">
    <a class="btn-floating btn-large dmp-main-back">
      <i class="large ion-android-menu"></i>
    </a>
    <ul>
      <li><a class="btn-floating dmp-main-back custom-item-navigation" href="#account"><i class="mate">insert_chart</i></a></li>
      <li><a class="btn-floating dmp-main-back custom-item-navigation" href="#account"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating dmp-main-back custom-item-navigation" href="#account"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating dmp-main-back custom-item-navigation" href="#account"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>



   <script>
   		$('#floating-button-hider').on('click',function(e){
   			e.preventDefault();
   			if($('i',this).hasClass('ion-chevron-left'))
   			{
   			   $('i',this).removeClass('ion-chevron-left').addClass('ion-chevron-right');
   			   $('#dmp-variable-content-main').removeClass('l10 m10 s10').addClass('l12 m12 s12');
			   $('#side-control-panel').addClass('hidden');
   			   $(this).attr("data-tooltip","Afficher Le Quick Menu");
   			}
   			else
   			{
   			   $('i',this).addClass('ion-chevron-left').removeClass('ion-chevron-right');
   			   $('#dmp-variable-content-main').addClass('l10 m10 s10').removeClass('l12 m12 s12');
   			   $('#side-control-panel').removeClass('hidden');
   			   $(this).attr("data-tooltip","Masquer Le Quick Menu");
   			}
   		});

   </script>