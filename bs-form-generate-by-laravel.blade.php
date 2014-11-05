<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Form Generate By Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{URL::to('/public/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="welcome">
{{ Form::open(array('url' => 'articles', 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('inputEmail', '邮箱', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::email('email', '', array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'email', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputText', '文字', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::text('text', '', array('id' => 'inputText', 'class' => 'form-control', 'placeholder' => 'text', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputTextarea', '文本框', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::textarea('textarea', '', array('id' => 'inputTextarea', 'class' => 'form-control', 'placeholder' => 'textarea', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputPwd', '密码', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::password('text', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => 'pwd', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputHidden', '隐藏', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::hidden('text', 'hidden', array('id' => 'inputHidden', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputFile', '文件', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::file('file', array('id' => 'inputFile', 'class' => 'form-control', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputCheckbox1', '堆叠复选框', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('checkbox1', '1', true); }} 1
                </label>
            </div>
            <div class="checkbox disabled">
                <label>
                    {{ Form::checkbox('checkbox1', '2'); }} 2
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputRadio1', '堆叠单选框', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            <div class="radio">
                <label>
                    {{ Form::radio('radio1', '1', true); }} 1
                </label>
            </div>
            <div class="radio">
                <label>
                    {{ Form::radio('radio1', '2'); }} 2
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputCheckbox2', '内联复选框', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            <div class="checkbox-inline">
                <label>
                    {{ Form::checkbox('checkbox2', '1', true); }} 1
                </label>
            </div>
            <div class="checkbox-inline">
                <label>
                    {{ Form::checkbox('checkbox2', '2'); }} 2
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputRadio2', '内联单选框', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            <div class="radio-inline">
                <label>
                    {{ Form::radio('radio2', '1', true); }} 1
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    {{ Form::radio('radio2', '2'); }} 2
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputNumber', '数字', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::number('number', '', array('id' => 'inputNumber', 'class' => 'form-control', 'placeholder' => 'number', 'required' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputSelect1', '下拉列表1', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::select('select1', array('1' => 'One', '2' => 'Two'), '2', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('inputSelect2', '下拉列表2', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::select('select2', array('1' => 'One', '2' => 'Two'), '2', array('class' => 'form-control', 'multiple' => 'true')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('', '提交', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-7">
            {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
{{ Form::close() }}
    </div>
</body>
<script src="{{URL::to('/public/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{URL::to('/public/js/bootstrap.min.js')}}"></script>
</html>
