@extends('backend.layouts.default')
@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            
        </div>
    </div>

    <div class="container-fluid"> 
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       
        <br />
        <span style="color:green;text-align:center"></span>
        <br />
        <br />
        <div class="card">
            <div class="header">
                <h2>
                   Add New Question
                </h2> 
            </div>
            <div class="body">
                <form action="/Admin/QuestionAdd" method="post" id="frm">
                    <input type="hidden" name="SurveyId" value="109" />
                    <input type="hidden" id="OptionJson" name="OptionJson" />
                    <label for="email_address">Question</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea class="form-control" id="question" name="QuestionName" placeholder="Enter Question Name" required cols="3" rows="3"></textarea>
                        </div>
                    </div>
                    <label for="email_address1">Select Answer Type</label>
                    <div class="form-group">
                        <div class="form-line">
                            <div id="fb-editor"></div>
                        </div>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect submit">Add Question</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/form.js')}}"></script>
<script src="{{asset('assets/js/form1.js')}}"></script>

<script>
    jQuery(document).ready(function ($) {
        var $fbEditor = $(document.getElementById('fb-editor'));
        renderWrap = document.querySelector('.render-wrap'),
            fbOptions = {
                showActionButtons: false,
                dataType: 'json',
                disableFields: [
                    'autocomplete',
                    'date',
                    'checkbox',
                    'header',
                    'button',
                    'file',
                    'hidden',
                    'paragraph'
                ],
            };
        var formBuilder = $fbEditor.formBuilder(fbOptions).data('formBuilder');
        $(".submit").click(function (e) {
            e.preventDefault();
            $(renderWrap).formRender({
                dataType: 'json',
                formData: formBuilder.formData
            });

            $("#OptionJson").val(formBuilder.formData)
            $("#frm").submit();
        });
    });
</script>

<link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/payment1.css')}}">


<style>
    .checkbox-group-field .description-wrap,
    .checkbox-group-field .label-wrap,
    .checkbox-group-field .className-wrap,
    .checkbox-group-field .name-wrap,
    .checkbox-group-field .access-wrap,
    .checkbox-group-field .other-wrap {
        display: none !important;
    }

    .radio-group-field .description-wrap,
    .radio-group-field .label-wrap,
    .radio-group-field .className-wrap,
    .radio-group-field .name-wrap,
    .radio-group-field .access-wrap,
    .radio-group-field .other-wrap {
        display: none !important;
    }


    .number-field .description-wrap,
    .number-field .label-wrap,
    .number-field .className-wrap,
    .number-field .name-wrap,
    .number-field .access-wrap,
    .number-field .other-wrap {
        display: none !important;
    }

    .select-field .description-wrap,
    .select-field .label-wrap,
    .select-field .className-wrap,
    .select-field .name-wrap,
    .select-field .access-wrap,
    .select-field .other-wrap,
    .select-field .multiple-wrap,
    .select-field .placeholder-wrap {
        display: none !important;
    }

    .text-field .description-wrap,
    .text-field .label-wrap,
    .text-field .className-wrap,
    .text-field .name-wrap,
    .text-field .access-wrap,
    .text-field .other-wrap {
        display: none !important;
    }

    .textarea-field .description-wrap,
    .textarea-field .label-wrap,
    .textarea-field .className-wrap,
    .textarea-field .name-wrap,
    .textarea-field .access-wrap,
    .textarea-field .other-wrap {
        display: none !important;
    }

    .field-actions > copy-button btn icon-copy {
        display: none !important;
    }

    #frmb-0-fld-3-copy {
        display: none !important;
    }

    .option-label {
        display: none !important;
    }
</style>

</div>
</section>

@stop