Miscellaneous types are specialized types that unlike generic types are not
designed to be reused by other types. They can have types based on them, but
they are not created with the intention of having other types based on them.

### `Instantiatable` interface

`Instantiatable` is the default interface for classes that have state. The
mjolnir conventions require avoiding using `new` and always producing objects
though factories. This interface merely enforces the convention on an object.

In general you should extend the class `Instantiatable` which implements this
interface and enforces the convention. This interface is specifically designed
for adapter patterns.

The interface merely provides an `instance` method, which as per the
conventions needs to allow for the production of "default" or "neutral state"
objects (ie. all parameters must be optional).

### `Writer` interface

A `Writer` is as it's named implies an interface designed for objects that
write to a specific medium (eg. console writer). The interface enforces
conventions that allow for writing as well formatting.

### `Lang` interface

The `Lang` interface is designed to facilitate internationalization. This
interface is more of a convention because the object in question in not
designed to be passed around as a parameter to another object (in general).

The interface is amalgam of static and object based handling and various other
tools that are required.

The following are the tools described by the interface (all static), others may
be included in an implementation.

 * `targetlang_*`/`targetlang`, for specifying the language to translate to
 * `idlang`, underscore version of language tag

In modules, static (ie. global) handlers should be used:

 * `term` is used when it's desirable to fallback on the key text if the
   translation is missing

 * `key` is used for retrieving a key based translation

 * `load` is a helper for loading structured directories in the language files

 * `file` is a helper for loading a file as a translation (eg. legal documents
   or just documents in general, that are better translated as a whole, rather
   then in pieces)

In the application space the library/index system (object based) is recommended:

 * `addlibrary` loads a library into the translation index
 * `idx` loads a term from the specific library

The indexed system is much cleaner and easier to use then the global system,
but is ill suited for use in modules which are meant to be reusable.

The language configuration is left to the implementation, but in general
passing parameters to the translation needs to be supported to ensure grammar
can be taken into account when translating, since otherwise grammar rules need
to be included in the code requesting the translation which either forces
bad translations, convoluted grammar rules, or prevents certain languages from
getting translations due to their grammar rules not being compatible with the
rules provided.

### `PDFWriter` interface

The `PDFWriter` interface provides a standard for converting html to PDF and
distributing it, including stream.

### `Pager` interface

The `Pager` interface like the `Lang` interface is more of a convention.

The interface provides some of the minimal functionality required for a pager.
Implementations may provide additional functionality.

### `Protocol` interface

The `Protocol` interface like the `Lang` interface is more of a convention.

As with the `Pager` the interface merely ensures minimum functionality.

### `Puppet` interface

The Puppet interface provides a convention for named objects. The point of
having named objects is to allow for dynamic resolution between classes,
removing redundant declarations.

Implementations typically should extend the `Puppet` class provided by the
library. This interface is provided for adapter patterns.

The interface ensures a class has the following methods:

 * `singular`, singular name
 * `plural`, plural name
 * `dashsingular`, dashed version of singular
 * `dashplural`, dashed version of plural
 * `codename`, underscore version of signular
 * `codegroup`, underscore version of plural
 * `camelsingular`, camelcase version of singular
 * `camelplural`, camelcase version of plural

### `RelayNode` interface

A `RelayNode` is designed for universal routing.

Modules should always use `RelayNode`s.

### `Task` interface

Task objects are a `Executable Meta Writable` composite.

Tasks are designed primarily for console use.

### `TaskRunner` interface

A task runner object is a `Executable Writable` composite.

### `URLRoute` interface

`URLRoute` objects are used in specifying as the name implies URL based routes,
since routes may match other patterns that are not URL related.

### `Validator` interface

A validator interface is a `Matcher` with methods for specifying fields and
rules and the notion of errors.

### `VideoConverter` interface

The video converter interface is used as a convention for converting videos
from one format to another with a `convert` method.
