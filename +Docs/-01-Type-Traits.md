All types have a corresponding trait using the naming convention of prefixing
the interface name with `Trait_`.

Within the library one reason why traits are used is to keep the codebase dry
by moving a lot of boilerplate code (such as getters, aliases, magic method) to
the corresponding trait. So for example the trait for the `HTMLForm` defines
all the field shorthand methods (ie. `text`, `password`, etc) which are all
just fancy aliases for the `field` method.

Another reason is to manage trait bloat. Essentially one problem that happens
when you use a fair amount of traits is that you start to have long hard to
follow trait hierarchies, so for example a `Task` is a `Executable`, `Meta`,
`Writable`. This means that every class that implements `Task` needs to use the
corresponding traits for the `Executable`, `Meta` and `Writable` interface. If
the class is just implementing `Task` the trait declarations might not be too
unintuitive but as you add more interfaces to the class they become unwieldy.
To combat this, all traits of a interface are responsible for managing the
traits of the extended interfaces. This makes for easy to follow trait
declarations. **There is one exception.** If a interface is intended to be used
by a class which is a child class of another class, the trait will not borrow
the implementation from the super interface since the class by extending the
class will automatically get the implementation anyway. For example, the trait
for the `HTMLFormField_Boolean` interface (used by radio and checkbox fields)
does not touch the trait for the `HTMLFormField` interface. Or, the trait for
the `HTMLFormField` interface does not touch the trait for the `HTMLTag`
interface.

Finally the main reason traits are extensively (and to some extend why
interfaces are so extensively used) is to allow for high level of code injection
though out the library. For example the `Meta` interface manages most metadata
related tasks; if you ever want to do some specific operation or have some
specific shorthand you need only extend the trait in your application modules,
or some specific plugin, add the functionality and it will be inherited by all
the classes within the library that use the `Meta` interface (which in this case
would be a lot!).

Here is an example of how you would go about extending the trait:

    trait Trait_Meta
    {
        use next\Trait_Meta;

        // your extra features

    } # trait

In the example `next\Trait_Meta` will be resolved to the closest trait in the
module hirarchy so this code will transparently create a chain of traits
extending other traits for functionality (finishing up with
`\mjolnit\types\Trait_Meta`). For more information on the special namespace
segment `next` see the Cascading File System section.
