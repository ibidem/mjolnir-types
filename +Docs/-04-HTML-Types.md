The main HTML type is `HTMLTag` which is mainly a `Meta`, `Renderable` composite
with the added attributes `tagname` and `tagbody`. All the meta attributes
directly translate to attributes on the tag.

So for example,

	// create a tag
	$tag = HTMLTag::instance()
		->tagname_is('p')
		->tagbody_is('hello, world');

	// add a class to the tag
	$tag->add('class', 'an');

	// add another class
	$tag->add('class', 'example');

Implementations will typically provide a meta renderer for `class` by default so
rendering the `$tag` object above would yield
`<p class="an example">hello world</p>`.

### `HTMLForm` interface

The `HTMLForm` type is used to facilitate form management. The interface
involves primarily a series of methods for creating fields, mainly `field` and
several aliases; but implementation wise they all might be specialized.
Fundamentally it is a `Standardized`, `HTMLTag`.

With a few exceptions, all fields follow the same pattern of
`$label, $fieldname`. The `$fieldname` parameter is optional to allow for
creating creating form elements that are meant to be script manipulated and not
submitted, or submitted directly; for example fields in an equation only serves
the purpose of providing input.

Exception to the field rule above are the following: `hidden` and `composite`.
A `hidden` field is hidden so it does not have a label, only a field name. On
the other hand a composite field is a amalgam of other fields so it has a label
but does not have a field name.

To set up autocomplete you would use the `autocomplete` method (which accepts
an array of values) and to retrieve a value you would use the autovalue method.
Implementations will typically autopopulate a form if the request had a form
parameter with the form's name.

Errors are specified via `errors_are` method. You can retrieve errors for a
given field via the `errors` method.

Formatting wise you have access to proxy methods that will setup how
`HTMLFormField` will be configured. These methods are `addfieldtemplate`,
`addhintrenderer`, `adderrorrenderer`. You also have access to getters on the
specific configuration via: `fieldtemplate`, `hintrenderer` and `errorrenderer`.

The interface also issues several signing methods. These are used to specify how
the a specific tag in html belongs to the form. Typically these are used by
`HTMLFormField` and on buttons in practice; since it's easier to write a button
and sign it then to do it via the `HTMLTag` interface (very little benefit to
doing it via `HTMLTag` as well).

The signature methods are `signature`, `sign` and `mark`. `signature` retrieves
a raw signature for a given id, or return the form's base signature if no id
is provided. `sign` will generate a basic sinature, typically just specifying
the `form` attribute, while `mark` will issue a signature and any additional
relevant meta; for example a `tabindex`.

The `basicuploader` and `nonuploader` are shorthand methods for configuring the
form to handle file uploads; or not handle file uploads.

The form will typically include it's signature when it's created, to allow for
autocomplete when a submission fails with errors, but sometimes this is not
desirable such as when we have a GET based search form. To prevent the form
from including additional fields on it's own, the `disable_metainfo` method can
be used. `enable_metainfo` can be used to switch it back.

### `HTMLFormField` interface

Like `HTMLForm`, a `HTMLFormField` is also a `Standardized`, `HTMLTag`. A
`HTMLFormField` consists of several parts. First are it's form related methods:
`form` (getter and setter), and the operations `noerrors` and `showerrors`.
`form` deals with which form we're handling and the two other methods toggle
on or off the display of errors passed down by the form to the field.

After it's form related parts the field has it's basic attribute handlers,
related to it's `value` and `fieldlabel`. `value` typically won't have a getter
just a series of setters, with at least a default setter `value_is`; this is due
to the potentially volatile nature of a field's value.

Finally a field has a template handling methods dealing with the following
segments that compose a field:

 * `hints`, which represent tips to the user one might attach to the field; such
as what the minimum length for a user's password is, or that their password can
be any length, etc

 * `errors`, which represent a list of error messages. Some fields might
consider only the top most error relevant but the interface always expects a
list to be what is processed

 * `fieldrender` which represents the core part of a field with everything else
stripped away (for most fields this would be the humble `input` tag).

The default methods defined by the interface for the above are: `hint`, `hints`,
`adderror` (to insert an error message), adderrors (to insert many messages),
`errors` and `fieldrender`.

To defined the composition you would specify it via a `fieldtemplate`. The
template will have the following symbols replaced with the corresponding
element of a form:

 * `:id` will be replaced with the field's id
 * `:label` will be replaced with the field's label
 * `:field` will be replaced with the field's `fieldrender`
 * `:hints` will be replaced with the rendered version of the field's hints
 * `:errors` will be replaced with the rendered version of the field's hints

By default the template will simply be `:field` for most implementations.

Also by default the `hintrenderer` and `errorrenderer` used above to replace
`:hints` and `:errors` will output an empty string.
