<?php

namespace Fayne\SensitiveField\Forms\Components;

use Closure;
use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use LogicException;

class SensitiveField extends Field
{
    protected string $view = 'filament-sensitive-field::sensitive';

    protected ?Closure $authorizationCallback = null;

    protected ?Closure $valueCallback = null;

    public function revealUsing(Closure $authorize, Closure $resolve): static
    {
        $this->authorizationCallback = $authorize;
        $this->valueCallback = $resolve;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->dehydrated(false);
        $this->afterStateHydrated(fn (SensitiveField $component) => $component->rawState(null));
        $this->registerActions([
            Action::make('reveal')
                ->label(__('filament-sensitive-field::sensitive-field.reveal'))
                ->modalHeading(__('filament-sensitive-field::sensitive-field.heading'))
                ->modalSubmitAction(false)
                ->modalCancelActionLabel(__('filament-sensitive-field::sensitive-field.close'))
                ->modalContent(function (SensitiveField $component) {
                    if (! $component->authorizationCallback || ! $component->valueCallback) {
                        throw new LogicException(__('filament-sensitive-field::sensitive-field.callback_required'));
                    }
                    abort_unless(($component->authorizationCallback)($component), 403);

                    return view('filament-sensitive-field::sensitive-value', ['value' => ($component->valueCallback)($component)]);
                }),
        ]);
    }
}
