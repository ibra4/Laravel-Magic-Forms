<?php

namespace Ibra\MagicForms\Builder\Form;

trait MagicFormRenderer
{
    private $post_methods = ['PATCH', 'PUT', 'DELETE'];

    /**
     * Makes a form view.
     *
     * @return string
     */
    public function render($closeTag = false)
    {
        $this->method_field = in_array($this->method, $this->post_methods) ? $this->method : null;
        $this->html_method = in_array($this->method, $this->post_methods) ? 'POST' : $this->method;

        $viewName = $closeTag ? "begin" : "index";
        return view("magic_form::forms.$viewName")->with('form', $this);
    }

    /**
     * Makes a form view without close tag </form>.
     *
     * @return string
     */
    public function begin()
    {
        return $this->render(true);
    }

    /**
     * Makes a close tag </form>
     *
     * @return string
     */
    public function end()
    {
        return view('magic_form::forms.end');
    }

    /**
     * Makes a submit button
     *
     * @return string
     */
    public function submit()
    {
        return view('magic_form::forms.submit');
    }
}
