<?php
namespace App\Traits;


trait CommonModuleMethods {

    /**
     * Assist with locating the view.
     *
     * @param string $view
     * @param array $data
     * @param boolean $strict
     * @return mixed
     */
    protected function view($view, $data =[], $strict = false) {
        if ($this->getViewRoot() && !$strict) {
            $view = $this->getViewRoot() . "." . $view;
        }

        if (view()->exists($view)) {
            return view($view, $data);
        }

        return view('errors.404');
    }

    /**
     * Get the view paath.
     *
     * @return boolean
     */
    protected function getViewRoot() {
        if (property_exists($this, 'viewRoot')) {
            if (!empty($this->viewRoot)){
                return $this->viewRoot;
            }
        }
        return false;
    }
}