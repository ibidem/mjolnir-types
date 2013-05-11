The view types are `RawView`, `View` and `ViewStash`.

### `RawView` interface

The `RawView` interface is the base view and designed for generic
implementation such as views that are not based on files.

To pass variables into the view you would use either `bind` for passing by
reference or `pass` for passing the value. Note: PHP is "copy-on-write" so this
is actually faster then passing by reference if you are not doing some complex
manipulation.

To get a list of all the variables you use the `viewvariables` accessor. If you
want to pass the variables of one view to another, you can call `inherit`
and pass the desired parent view.

To generate inline views you use the `frame` and `endframe` methods. Calling
`endframe` will return a string.

### `View` interface

The `View` interface is merely a `FileBased RawView`.

### `ViewStash` interface

A `ViewStash` can be used when processing relatively static content that
requires a lot of processing to generate.
