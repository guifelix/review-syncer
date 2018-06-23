<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'label', 'value', 'attributes', 'help']);


        Form::component('bsSelect', 'components.form.select', ['name', 'label', 'arrOptions', 'value', 'attributes', 'help']);


        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'label', 'value', 'checked', 'help','attributes']);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'label', 'value', 'attributes', 'help']);
        Form::component('bsInputGroup', 'components.form.inputgroup', ['name', 'label', 'value', 'attributes', 'addon']);
        Form::component('bsFile', 'components.form.file', ['name', 'label', 'attributes', 'help']);
        Form::component('bsEmail', 'components.form.email', ['name', 'label', 'value', 'attributes', 'help']);
        Form::component('bsPassword', 'components.form.password', ['name', 'label', 'attributes', 'help']);
        
        

        Form::component('bsRadio', 'components.form.radio', ['name', 'label', 'arrOptions', 'value', 'attributes', 'help']);


        Form::component('bsDatepicker', 'components.form.datepicker', ['name', 'label', 'value', 'attributes', 'help']);
        Form::component('bsDaterange', 'components.form.daterange', ['name', 'label', 'value', 'attributes', 'help']);
        Form::component('bsNumber', 'components.form.number', ['name', 'label', 'value', 'attributes', 'help']);
        Form::component('bsStatic','components.form.static',['name', 'label', 'value', 'number', 'help']);
        Form::component('bsHidden', 'components.form.hidden', ['name', 'value', 'attributes']);
        Form::component('bsButton', 'components.form.button', ['name', 'label' => false, 'fAwesome', 'attributes', 'help']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
