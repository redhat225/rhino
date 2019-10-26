                  <tr class="exams-item">  
                        <td></td>
                        <td>
                            <div class="col s12 input-field"> 
                               <i class="ion-android-list small prefix game-main-color"></i>
                                 <textarea name="libelle_exam[]" class="materialize-textarea" id="" placeholder="Renseignements cliniques"></textarea>
                            </div>
                       </td>
                       <td class="type-exams-item" style="padding-top: 40px !important;">
                         <div class="input-field col s12">
                        <select name="type_exam_id[]" id="" class="type_exam_select">
                                <?php foreach ($type_exams as $type_exam) :?>
                                    <option value="<?php echo $type_exam->id; ?>"><?php echo $type_exam->label_exam_type; ?></option>
                                <?php endforeach; ?>
                        </select>  
                          </div>
                       </td>
                        <td class="under-type-exams-item" style="padding-top: 40px !important;">

                       </td>
                        <td><i class="ion-android-cancel small dmp-main-color retired-exams-item pointer"></i></td>
                 </tr>  
