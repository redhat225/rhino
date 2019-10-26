                  <tr class="exams-item dmp-grey-text" visit-meeting-id='<?= $visit_meeting_id ?>'>  
                        <td></td>
                        <td>
                            <div class="col s12 input-field"> 
                               <i class="ion-android-list small prefix game-main-color"></i>
                                 <textarea name="libelle_exam" class="materialize-textarea libelle-exam-textarea" id="" placeholder="Renseignements cliniques"></textarea>
                            </div>
                       </td>
                       <td class="type-exams-item">
                         <div class="input-field col s12">
                        <select name="type_exam_id" id="" class="type_exam_select add-exam-select">
                                <?php foreach ($type_exams as $type_exam) :?>
                                    <option value="<?php echo $type_exam->id; ?>"><?php echo $type_exam->label_exam_type; ?></option>
                                <?php endforeach; ?>
                        </select>  
                          </div>
                       </td>
                        <td class="under-type-exams-item">

                       </td>
                        <td><a href="#!" class="save-item-exam-trigger"><?= h('Sauvegarder') ?></a></td>
                        <td>
                          <p class='loader-saving-exam hidden'>
                            <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini.gif') ?>
                          </p>
                          </td>
                        <td><i class="ion-android-cancel small dmp-main-color retired-exams-item pointer"></i></td>
                 </tr>  
