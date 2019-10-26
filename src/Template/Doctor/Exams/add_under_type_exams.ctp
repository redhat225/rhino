    <div class="input-field col s12">
        <select name="under_type_exam_id[<?= $index ?>][]" id="" multiple>
            <?php foreach ($under_type_exams as $under_type_exam) :?>
                <option value="<?php echo $under_type_exam->id; ?>"><?php echo $under_type_exam->label_exam_under_type; ?></option>
            <?php endforeach; ?>
        </select>  
     </div>