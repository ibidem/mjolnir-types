The following types are core types used though out the type system as base types
for other types:

 * Meta
 * Renderable
 * Executable
 * Standardized
 * Filebased
 * Processed
 * Channeled
 * Paged

Some of the more specialized generic interfaces

 * Writable
 * Savable
 * Recoverable
 * Matcher
 * Linkable
 * Contextual
 * Eloquent
 * Exportable

### `Meta` interface

The `Meta` interface is one of the most extensively used interfaces within the
library since they simplify property management. Using a class implementing the
interface is quite easy:

    // you set a property via the set method
    $object->set('my_property', 'my_value');

    // you retrieve the property via the get method
    $object->get('my_property');

    // you can also provide a default when getting a value
    // if not specified the default value is null
    $object->get('my_property', 'default_value');

    // when a property is an array you use add instead of set, though you can
    // still use set to replace the entire contents or empty the array
    $object->add('my_property', 'my_value');

    // sometimes you want to just get the entire metadata
    $object1->metadata();

    // ...typically you want an objects metadata to pass it to another
    $object2->metadata_is($object1->metadata());

Generally you would want to use `Meta` when you have a class that would otherwise
be bloated with a ton of properties. You don't need to sacrifice usability when
using meta since if you think a user might find a property hard to remember you
can simply create a magic method that just calls the corresponding meta method.

Typically you'll also get cleaner class code by working with one `metadata`
attribute, compared to working with 10+ attributes.

### `Renderable` interface

A renderable object is one that can be translated to string. Typically the whole
point of the object is to eventually get translated to a string.

The interface has one main method `render` which performs the translation to
string (it's use is self explanatory). The interface also defines several
utility methods: `addmetarenderer`, `metarenderer` and `injectmetarenderers`
which are used for objects which need help in rendering subparts of themselves.
For most renderable objects though, these will do nothing since they don't have
meta renderable parts to them.

For correctness while in development mode the `__toString` method of a
`Renderable` object is defined to throw an error (it will simply attempt to call
`render` in production). This is the default because a lot of the time rendering
involves injecting outside data and is not merely self contained to the object,
which may easily lead to errors and unfortunately PHP's magic `__toString`
method does not allow for errors to happen. In fact the best result you can get
when errors occur in the `__toString` method is to just return `null`, which
will also constitutes an error, but is at least semi-recoverable.

Occasionally implementations may have good reason to use `__toString` in which
case they would overwrite the behaviour defined by `Trait_Renderable` and allow
`__toString` to call `render` in both production and development, but still
return `null` on errors. The reasoning here is that these are systems where an
error is very unlikely, rare, or easily recoverable within the context of the
class.

### `Executable` interface

An executable is anything that can `run` (ie. execute).

There's nothing more to say about this interface, it's very much self
explanatory.

### `Standardized` interface

A standard is defined as a specific configuration on an object bearing a certian
name. So for example if we consider a form, the way twitter bootstrap defines
we should create the markup for said form is a essentially a standard. We can
create a `twitter` standard (in this case in the `mjolnir/htmlform`
configuration file) and we would use it on a `HTMLForm` like so:

    $form->apply('twitter');

Now presumably the form would output input fields with twitter bootstrap
markup; assuming we've defined it correctly.

Standards are useful because they provide an easy way to deal with boilerplate
configuration. Simply define the configuration in one place as a standard and
use it anywhere. They also help make a lot of configuration DRY with out
requiring the class itself from housing a self-configuration method for each;
instead you would intuitively place them in a configuration file.

### `Filebased` interface

There are many classes dealing with files. This interface standardizes the way
you communicate to such classes about the file they are working with.

	// specify a file based on a relative path determined by the rules and
	// conventions of the object in question
	$object->file_is('my_file');

	// specify via an absolute path
	$object->file_path('/path/to/my_file');

	// get file path
	$object->filepath();

### `Processed` interface

A `Processed` object is an object that has either processing before or after
(or both) it's execution or some other important event in it's life cycle.

The interface provides a means to add dynamic processors via `add_preprocessor`
and `add_postprocessor`, and also the main means of executing said processors
or otherwise specialized code though `preprocess` and `postprocess`.

An example of a class making use of this is your average Controller. You will
typically want to execute some code before and after the requested action.

### `Channeled` interface

A channeled object is an object that communicate using a channel or needs a
channel to work. A `Channel` is just a `Processed`, `Meta` object. So
essentially the whole idea of channels is you have this shared `Meta`.

This interface merely specifies the main getter and setter for such an object
when dealing with channels, ie. `channel_is` and `channel`.

### `Paged` interface

A lot of the time you deal with pagination. Paged does not deal with creating
the pagination but telling an object what page you want. It is used as follows:

	// limit result to a certain page
	$statement->page(2, 20, 3); # 2nd page, showing 30 (skipped 3)

	// the offset (3rd parameter) is optional
	$statement->page(1, 15); # 1st page, showing 15

	// if you want all simply provide null, if infinity is not an option this
	// method will merely retrieve the maximum number of entries possible
	$statement->page(null);

### `Writable` interface

A writable enabled object is one that accepts a writer. The interface merely
provides a generic way to add and retrieve the objects writer.

Implementing the interface doesn't mean the object itself is writable on, just
that it works with a writer

An example interface that uses this type is the `Task`.

### `Savable` interface

A savable object is one that requires it's present state to be saved when
performing operations.

### `Recoverable` interface

A recoverable object is one that provides a `recover` operation. The operation
should reset the state of the object to something that can be processed given
it's present unstable state.

Typically this involves the object being executable or renderable and once
recovered the object is merely re-executed or re-rendered.

### `Matcher` interface

A matcher object is one that provides a `check` method returning a boolean
value of `true` or `false`. As it's name implies it's designed to match
something, however the interface does not force any input conventions to allow
for any type of match. Typically the matcher object will simply store the
information for what to match against in it's state.

### `Linkable` interface

A linkable object is one that can be converted to a URL, ie. universal resource
locator.

The interface is specifically designed for converting to URLs and not URIs.

### `Contextual` interface

An object implementing the contextual interface means the object has context,
typically security relevant context (but not enforced as such). The interface
provides a single universal `context` method that causes the object to either
return null or an array representation of it's context.

This should not be thought of as serialization where the object in question
can be deserialized. A contextual object is merely one that can provide context
for inspection purposes.

### `Eloquent` interface

An eloquent object is one that allows language prefixes. The way it works is
that you provide a language prefix and any keys used for translation in the
objects internals get prefixed with said language prefix, giving you control
over all the objects translations but allowing you to have multiple instances
of the same object with different translations.

### `Exportable` interface

An exportable object is one that can produce an array representation of it's
state. This is similar to serializing an object only the data representation is
an array instead of a string.

Exporting an object is generally meant for exporting to another medium, hence
the easier to work with array type, rather then exporting and importing back
into a later session (ie. what serialization is meant for).
