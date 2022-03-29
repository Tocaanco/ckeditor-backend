# Laravel package for form fields

## Installation


#### You can install the package via composer

```bash
composer require tocaan/ckeditor5
```

### Publish the configuration file

```bash
php artisan vendor:publish --provider="Ckeditor5\CkEditor5ServiceProvider"
```

## Usage
 
 first you must append `script and style files` to your layouts
  
```html
    {{-- styles --}}
    <link href="{{asset('ckeditor5/css/ckeditor.css')}}" rel="stylesheet" id="style_components" type="text/css" />

    {{-- scripts --}}
    <script src="{{asset('ckeditor5/js/ckeditor.js')}}"></script>
    <script src="{{asset('ckeditor5/js/ckEditorScripts.js')}}"></script>
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
