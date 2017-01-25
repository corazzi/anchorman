<?php

namespace Kayrunm\Anchorman\Traits;

/**
 * This might be slightly pointless, but it's useful to indicate to someone that
 * the model that is using this trait is using a presenter implementation.
 */
trait Presentable
{
    /**
     * The instance of our presenter
     *
     * @var \Kayrunm\Anchorman\Presenter
     */
    protected $presenterInstance;

    /**
     * Returns the name of this model's presenter.
     *
     * @return \Kayrunm\Anchorman\Presenter
     *
     * @throws \Kayrunm\Anchorman\PresenterException
     */
    public function presenter()
    {
        // If the presenter hasn't been declared, throw our exception
        if (is_null($this->presenter)) {
            throw new PresenterException();
        }

        return $this->presenter;
    }

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