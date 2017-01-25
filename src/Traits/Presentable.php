<?php

namespace Kayrunm\Anchorman\Traits;

/**
 * This might be slightly pointless, but it's useful to indicate to someone that
 * the model that is using this trait is using a presenter implementation.
 */
trait Presentable
{
    /**
     * The presenter for this view.
     *
     * @var string
     */
    protected $presenter = "";

    /**
     * The instance of our presenter
     *
     * @var \Kayrunm\Anchorman\Presenter
     */
    protected $presenterInstance;

    /**
     * Return an instance of our presenter instead of the fully-qualified
     * class name.
     *
     * @return \Kayrunm\Anchorman\Presenter
     */
    public function getPresenterAttribute()
    {
        if (is_null($this->presenterInstance)) {
            $this->presenterInstance = new $presenter($this);
        }

        return $this->presenterInstance;
    }
}