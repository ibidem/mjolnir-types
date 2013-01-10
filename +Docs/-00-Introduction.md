To allow for easier use of classes a lot of common functionality has been
centralized into a set of interfaces.

This is a multifaceted feature. However, to avoid confusion the interfaces are
designed for work within the framework, and while they may be used outside the
framework as you please, they are not designed with that in mind. Essentially
if it exists, it's because it has a purpose within the framework, not because
it's some sort of standard.

Some functionality interfaces establish within the framework,

 1. simplified interaction with classes sharing common themes, such as file
 manipulation, document-like content, etc

 2. easier to understand and use; employing interfaces creates repeatable easy
 to pick up patterns

 3. easy integration, we try to avoid classes accepting implementation extending
 some base class; instead of just implementing the interface is fine

 4. facilitate adapter patterns

(This is not an exhaustive list)

Fine details will be treated in individual sections, however one common point is
getters, commands, and setters.

In the mjolnir interfaces a getter is always a function with the name of the
property:

	$content = $document->body(); # "content equals document body"
	$writer->eolstring();

If useful you can return sub types derived from the main type of the property.
You should do this by appending a keyword after the property name, but avoiding
and underscore.

	$view->file();        # relative path
	$view->filepath();    # absolute path
	$view->filehandler(); # file handler
	$view->fileobject();  # file as an object

It can be as crazy as you like, for example:

	$view->fileurl();

A setter on the other hand is a function that is never just the name of the
property. In mjolnir all setters are composed of the name of the property
(always the first part) followed by either the generic term, such as "is", a
type or some other descriptive word, concatenated together with an underscore.
So lets say we have a class representing a html tag, setters for the class
property might look as follows.

	$tag->class_is('btn'); # "tag class is btn"
	$tag->class_string('btn btn-primary');
	$tag->class_array(['btn', 'btn-primary']);
	$tag->class_from($other_tag);

This patterns keeps the getters and setters close togheter and allows for a lot
of setters with very intuitive syntax.

The third category is commands. So for example, continuing from the example
above the following are comamnds:

	$tag->appendclass('btn-primary');
	$tag->removeclass('btn');
	$tag->standard('twitter');

The variant `$tag->class_append('btn-primary')` is discouraged because it blurs
the line between what's a variant on a setter and what's a manipulation
function. Functions, such appending a class, aren't looked any differently then
any other non-setter or non-getter function. When it comes to naming, active
wording is preferred, but not required.

To clarify, as a rule of thumb if you have a function that only partially sets
a property, it's probably a manipulation function and not a setter. A setter
should (typically) set the whole value.

A setter doesn't imply a getter, and neither does a getter imply a setter. Both
can exist with out the other, and of course you can just have internal
properties or states that are simply manipulated but never explicitly gotten
or set on their own.

Sometimes the rules may be broken in favor of using very
established terminology.
