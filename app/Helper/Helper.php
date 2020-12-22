<?php


namespace App\Helper;


use function PHPSTORM_META\elementType;

class Helper
{
    public static function getPollStatusClass($status)
    {
        switch (trim(strtolower($status))) {
            case 'pending':
                return 'text-warning';
            case 'approved':
                return 'text-info';
            case 'published':
                return 'text-primary';
            case 'rejected':
                return 'text-danger';
        }
    }
    public static function getPollStatus($status){
        switch ($status){
            case 1:
                return 'approved';
            case 2:
                return 'published';
            case 3:
                return 'rejected';
        }
    }
    public static function buildAns($poll){
        $html= "";
        //dd($poll);
        switch ($poll->option_type){
            case 'radio':
                foreach ($poll->answers as $ans):
                    $html .= '<div class="form-group">';
                    $html .= '<div class="form-check">';
                    $html .= '<div class="radio">';
                    $html .= "<input class='form-check-input' name='options' type='radio' value='".$ans->id."'/>";
                    $html .= '<label class="form-check-label" for="gridRadios1">'.$ans->ans_title.'</label>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                endforeach;
                break;
            case 'checkbox':
                foreach ($poll->answers as $ans):
                    $html .= '<div class="form-group">';
                    $html .= '<div class="form-check">';
                    $html .= '<div class="checkbox">';
                    $html .= '<input class="form-check-input" type="checkbox" value="'.$ans->id.'" name="options[]" />';
                    $html .= '<label class="form-check-label" for="gridRadios1">'.$ans->ans_title.'</label>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                endforeach;
                break;
            case 'textbox':
                    $html .= '<div class="form-group">';
                    $html .= '<input class="form-control" type="text" value="" placeholder="type your comment" name="ans" />';
                    $html .= '</div>';
                break;
            case 'textarea':
                    $html .= '<div class="form-group">';
                    $html .= '<textarea rows="5" class="form-control" placeholder="type your comment" name="ans" ></textarea>';
                    $html .= '</div>';
                break;
            default:
                break;

        }

        return $html;
    }
    public static function details($poll){
        $html= "";
        //dd($poll);
        switch ($poll->option_type){
            case 'radio':
                foreach ($poll->answers as $ans):
                    $html .= '<div class="form-group">';
                    $html .= '<div class="form-check">';
                    $html .= '<div class="radio">';
                    $html .= "<input class='form-check-input' name='options' type='radio' value='".$ans->id."'/>";
                    $html .= '<label class="form-check-label" for="gridRadios1">'.$ans->ans_title.'</label>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                endforeach;
                break;
            case 'checkbox':
                foreach ($poll->answers as $ans):
                    $html .= '<div class="form-group">';
                    $html .= '<div class="form-check">';
                    $html .= '<div class="checkbox">';
                    $html .= '<input class="form-check-input" type="checkbox" value="'.$ans->id.'" name="options[]" />';
                    $html .= '<label class="form-check-label" for="gridRadios1">'.$ans->ans_title.'</label>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                endforeach;
                break;
            case 'textbox':
                $html .= '<div class="form-group">';
                $html .= '<input class="form-control" type="text" value="" placeholder="type your comment" name="ans" />';
                $html .= '</div>';
                break;
            case 'textarea':
                $html .= '<div class="form-group">';
                $html .= '<textarea rows="5" class="form-control" placeholder="type your comment" name="ans" ></textarea>';
                $html .= '</div>';
                break;
            default:
                break;

        }

        return $html;
    }
    public static function getTotalVote($poll){
        $total = 0;
        if($poll->option_type == 'radio'|| $poll->option_type == 'checkbox') {
            if ($poll != null && $poll->answers->count() > 0) {
                foreach ($poll->answers as $ans):
                    $total += intval($ans->vote);
                endforeach;
            }
        }else{
            switch (trim($poll->option_type)){
                case 'textbox':
                    $total = $poll->textanswers()->whereNotNull('short_ans')->count();
                    break;
                case 'textarea':
                    $total = $poll->textanswers()->whereNotNull('big_ans')->count();
                    break;
            }
        }
        if($poll->option_type == 'checkbox'){
            $total = ceil( $total / $poll->option_num);
        }

        return $total;
    }
    public static function getSingleVote($poll, $isReport = false){
        $total = self::getTotalVote($poll);
        $html = "";
        if($poll != null && $poll->answers->count() > 0){
            foreach ($poll->answers as $ans):
                if($poll->option_type == 'radio' && !$isReport)
                    $html .= "<h6>{$ans->ans_title} <span class=\"badge badge-secondary\">".round(($ans->vote / $total) * 100,2)."%</span></h6>";
                else
                    if($poll->option_type == 'checkbox'){
                        $total = floor($ans->vote);
                        if(!$isReport) {
                            $total = round((abs( ($total / $poll->option_num)) * 100) / 100,2);
                            $html .= "<h6>{$ans->ans_title} <span class=\"badge badge-secondary\">" . $total . "%</span></h6>";
                        }else {
                            $total = round((abs( ($total / $poll->option_num)) * 100) / 100,2);
                            $html .= "<h6>{$ans->ans_title} <span class=\"badge badge-secondary\">" . ceil($total) . "</span></h6>";
                        }
                    }elseif($poll->option_type == 'radio' && $isReport){
                        $total = $ans->vote;
                        $html .= "<h6>{$ans->ans_title} <span class=\"badge badge-secondary\">".$total."</span></h6>";
                    }
            endforeach;
        }
        return $html;
    }
    public static function getCheckBoxVote($poll){
        $total = self::getTotalVote($poll);
        foreach ($poll->answers as $ans):
            $total += (($ans->vote / $poll->option_num) - $total) / 100;
        endforeach;

        return $total;
    }
}