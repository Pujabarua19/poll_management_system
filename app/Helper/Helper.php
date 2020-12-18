<?php


namespace App\Helper;


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
                    $html .= '<div class="radio">';
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

        return $total;
    }

    public static function getSingleVote($poll){
        $total = self::getTotalVote($poll);
        $html = "";
        if($poll != null && $poll->answers->count() > 0){
            foreach ($poll->answers as $ans):
                $html .= "<h6>{$ans->ans_title} <span class=\"badge badge-secondary\">".round(($ans->vote / $total) * 100,2)."%</span></h6>";
            endforeach;
        }
        return $html;
    }

}