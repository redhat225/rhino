                  <tr class="requirement-item dmp-grey-text" treatment-id='<?= $treatment_id ?>'>  
                        <td>
                            <div class="col s12 input-field"> 
                               <i class="ion-erlenmeyer-flask-bubbles small prefix dmp-main-color"></i>
                                 <input name="label_requirement" class="label_requirement_input required" id="" placeholder='prescription'/>
                            </div>
                       </td>
                       <td>
                            <div class="col s12 input-field"> 
                               <i class="ion-ios-flask small prefix dmp-main-color"></i>
                                 <input name="posologie_requirement" class="posologie_requirement_input required" id="" placeholder='posologie'/>
                            </div>
                       </td>
                       <td>
                            <div class="col s12 input-field"> 
                                 <textarea name="obs_requirement" class="materialize-textarea obs_requirement_textarea" id="" placeholder='observations'/>
                            </div>
                       </td>

                        <td><a href="#!" class="save-item-requirement-trigger"><?= h('Sauvegarder') ?></a>             <p class='loader-saving-requirement hidden'>
                            <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif') ?>
                          </p></td>
                        <td><i class="ion-android-cancel small dmp-main-color retired-requirement-item pointer"></i></td>
                 </tr>