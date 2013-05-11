Application types are used in application composition. These are `Application`,
`Layer`, `Channel` and to some extent `Controller`. Almost any application will
be composed of a Application object managing Layer objects that communicate
though a Channel. Optionally you have Controllers in the terminating layer
doing work.

The layered design is meant to act as a modular execution plan. As an
example, you can have execution plans that have security features, or have
http features or have html features built in, and you can also have execution
plans that don't even know what http is. The separation avoids complicated
state logic and monolithic "kernel" objects. This is highly beneficial since
the layers may be juggled around and reused for different specialized goals.

As an aside, it is recommended you only use this approach if you can form a
stack out of your execution. If the execution is only composed of one
terminal layer that is very unlikely to accept any other layer then you're
better of implementing the plan as a simple class that is self contained rather
then use Application, Layer and so on. The task runner Overlord is a good
example of what not to implement as a Application stack.
