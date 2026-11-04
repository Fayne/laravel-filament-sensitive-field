<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div><span>*****</span> {{ $field->getAction('reveal') }}</div>
</x-dynamic-component>
