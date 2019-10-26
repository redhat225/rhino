<!--             <div class="col s3" id="filter-bills-wrapper">
                <h5 class="dmp-main-color" style="border-bottom:2px solid #130647; margin-bottom:40px;text-align:left;"> <i class="ion-levels dmp-main-color medium"></i> Filtres <i class="ion-android-radio-button-on red-text medium right pointer-opaq" id="init-filter-trigger"></i></h5>
                <div class="row" id="filter-tabs">
                     <div class="col s12">
                         <ul class="tabs tabs-fixed-width dmp-main-back" id="tabs-bills-filter" style="">
                             <li class="tab col s4"><a href="#filter-by-keywords"><i class="active ion-chatbubble-working white-text small"></i></a></li>
                             <li class="tab col s4"><a href="#filter-by-dates"><i class="ion-android-calendar white-text small"></i></a></li>
                             <li class="tab col s4"><a href="#filter-by-amount"><i class="ion-cash white-text small"></i></a></li>
                         </ul>
                     </div>
                     <div id="filter-by-keywords">
                         <div class="col s12 input-field">
                             <i class="ion-chatbubble-working prefix dmp-main-color small"></i>
                             <textarea class="materialize-textarea" name="keywords-search" id="keywords-search-id"></textarea>
                             <label for="keywords-search-id">Mots clé(s)</label>
                         </div>
                     </div>
                     <div id="filter-by-amount" class="center">    
                        <h6 class="dmp-main-color" style="padding-top:70px;">Définissez un interval de montants (F CFA)</h6>
                        <span id="range-value" class="dmp-main-color bold">
                          
                        </span>
                         <div class="col s12 input-field center" id="range-amount-filter">
                             
                         </div>
                         <div class="col s12" style="margin-top:30px;">
                            <input type="hidden" id="range-min" name="range-min">
                            <input type="hidden" id="range-max" name="range-max">
                            <button id="trigger-search-amount" class="btn teal white-text">Rechercher</button>
                         </div>
                     </div>
                     <div id="filter-by-dates">
                       <form id="form-search-by-date-bill">
                            <div class="col s12 input-field">
                                <h6 class="dmp-main-color bold"><?= h('Date Début') ?></h6>
                                <input type="date" class="date-filter-bill" required name="begin-date-filter-bills" id="begin-date-filter">
                            </div>
                            <div class="col s12 input-field">
                                <h6 class="dmp-main-color bold"><?= h('Date Fin') ?></h6>
                                <input type="date" class="date-filter-bill" required name="end-date-filter-bills" id="end-date-filter">
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                   <button class="btn teal white-text" id="trigger-search-by-date"  >Rechercher</button>
                                </div>
                            </div>
                       </form>
                     </div>
                </div>
            </div> -->