# Laravel package for form fields

## Installation


#### You can install the package via composer

```bash
composer require mostafasewidan/sewidan-field
```

### Publish the configuration file

```bash
php artisan vendor:publish --provider="SewidanField\SewidanFieldServiceProvider"
```

## Usage

You can make field with any type 
```php
    /**
     * @param $name is a field name 
     * @param $label 
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    field()->text('name','label','value',[]);
```


##### Output

```html
   <div class="form-group " id="{{$name}}_wrap">
           
       <label for="{{$name}}" class="col-md-2" style=""> {{$label}} </label>

       <div class="col-md-9" style="">
   
            <input placeholder="{{$label}}" value="{{$value}}" class="form-control" data-name="{{$name}}" id="{{$name}}" name="{{$name}}" type="text">

            <span class="help-block" style=""></span>
       
       </div>

   </div>
```

### Params

Fields is created using [laravel collective](https://laravelcollective.com)
```php
     $name  // is a field name (string | required)
     
     $label // is a label name (string | required)
     
     $value // is a value of input (string | the default value is null)
      you can use it with laravel collective form model 
      Form::model($model,[attributes])
     
     $field_attributes // is input attributes like class , style 
     //it take some default values like class : form-control and you can override
     // there values like ['class' => 'your-class' , 'style' => 'color:red']
     // (array | not required)
     // default : 
      [
          "placeholder" => $label,
          "class" => "form-control",
          "data-name" => $name,
          "id" => $name
      ]
     
```
## configuration file

 where you Publishing the provider you will find `config/field.php` file 
 you can control the content of `HTML` response by creating and switching themes 
 
 #### themes map keys
 ```html
    {{-- container --}} <div class="form-group " id="{{$name}}_wrap">
    {{-- label --}}         <label for="{{$name}}" class="col-md-2" style=""> {{$label}} </label>
    {{-- field_div --}}     <div class="col-md-9" style="">   
                                   <input placeholder="{{$label}}" value="{{$value}}" class="form-control" data-name="{{$name}}" id="{{$name}}" name="{{$name}}" type="text">
    {{-- field_error --}}          <span class="help-block" style=""></span>
                            </div>
                        </div>
 ```
 #### Control Themes in `config/field.php`
 ```php
     'default_theme' => env('FIELD_DEFAULT_THEME','default'),
     
         'themes' => [
     
             'default' => [
     
                 'container' => [
                     'active' => true,
                     'class' => 'form-group'
                 ],
     
                 'label' => [
                     'active' => true,
                     'options' => [
                         'class' => 'col-md-2',
                         'style' => ''
                     ],
                 ],
     
                 'field_div' => [
                     'active' => true,
                     'options' => [
                         'class' => 'col-md-9',
                         'style' => ''
                     ],
                 ],
     
                 'field_error' => [
                     'active' => true,
                     'options' => [
                         'class' => 'help-block',
                         'style' => ''
                     ],
                 ],
             ],
         ],
 ```
 
 you can change the default theme by set key `FIELD_DEFAULT_THEME` with your default theme name in
 `.env` file or change it in `config/field.php` `'default_theme' => env('FIELD_DEFAULT_THEME','your default theme name')`
 
 #### switching themes while creating field 
 
 you can easily but your theme name to field function
 
```php
    field('theme_name')->text('name','label','value',[]);
```

if you used field without entered theme name automatically function use the default theme
 
```php
    field()->text('name','label','value',[]); // take default theme in config file
```

 ### CK editor (5) :
 
 ###usage
 
 first you must append `script and style files` to your layouts
  
```html
    {{-- styles --}}
    <link href="{{asset('SewidanField/plugins/ck-editor-5/css/ckeditor.css')}}" rel="stylesheet" id="style_components" type="text/css" />

    {{-- scripts --}}
    <script src="{{asset('SewidanField/plugins/ck-editor-5/js/ckeditor.js')}}"></script>
    <script src="{{asset('SewidanField/plugins/ck-editor-5/js/ckEditorScripts.js')}}"></script>
```
after appending script and style files , you can use it simple like this
```php
    field()->ckEditor5('name','label','value',[]);
```
don't forget to add this script on submitting your form 

```javascript
    if (window.editors == undefined) {
        $.each(editors, function (index, editor) {
            editor.updateSourceElement()
        });
    }
```# Swedan-form
# ckeditor-backend
