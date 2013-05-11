The following types are database related:

 * `SQLDatabase` deals with operations on a SQL based database
 * `SQLStatement` are a byproduct of access to a SQL database
 * `Schematic` is the standard migration interface
 * `Marionette` is a general purpose object based modeling class
 * `MarionetteDriver` is a driver support for marionette
 * `MarionetteModel` is a base interface for single entity operations
 * `MarionetteCollection` is a base interface for collection operations

Note: the `Marionette` system is a object system designed specifically for
APIs, other systems are supported.

### `SQLDatabase` interface

The `SQLDatabase` interface is designed to very easily interface with PDO. To
this extent you'll have a `prepare`, `quote` and `last_inserted_id` methods.
The methods should be self explanatory, `prepare` to create a new prepared
statement, `quote` to make a string safe for concatenation and
`last_inserted_id` is used for retrieving the id of the last entry.

In addition, the `SQLDatabase` interface requires the underlying database
system to support transaction (denoted by `being`, `commit`, `rollback`).
Transactions need to be *usable* when nested, so multiple begins, commits and
rollbacks should function as expected and not interfere with each other.

Note that this is a *SQL database* interface and not meant to be used as a
generic *database* interface. A generic database interface is not provided
because there are no *generic* features to place in such a interface.

### `SQLStatement` interface

The `SQLStatement` interface is a `Paged`, `Executable`, designed around
compatibility with PDO.

For clarity the method syntax is very short and the interface forces a lot of
shorthands. While daunting most are implemented into the trait so the
explicitly required methods are actually very few unless the underlying system
that implements the interface can offer a very specialized and efficient
interface of it's own that matches said shorthands.

We'll avoid covering each and every method since there are many shorthands, but
as a general readers guide:

 - `num` stands for numeric and should be used with float, or integer values
 - `str` stands for string and should be used with string values
 - `date` stands for date & time and should be used with date and time values
 - `bool` stands for boolean and should be used with boolean values or values
   that can be translated to a boolean
 - the setters are the above with no other prefix or suffix
 - to mass assign you take the initial types and add a **s** (ie. make them
   plural)
 - if you wish to bind you precede the method with `bind` (ie. `bindnum` or
   `bindstrs`)
 - stored procedure arguments are specified only though `arg` and `args`

To retrieve results you use the `fetch_*` methods. So `fetch_object` for
retrieving as an object, `fetch_entry` for retrieving the first entry in a
result, and `fetch_all` for retrieving all the entries. If your query was a
calculation such as `SELECT COUNT(*) FROM something` you can use `fetch_calc` to
get the value (you can also pass a default).

Both `fetch_entry` and `fetch_all` accept a fieldformat parameter which is
essentially a list of mutation functions that are applied to the entry or
entries after they are retrieved. For example you can specify that a datatime
field is `'datetime'` and the result will have said field as a `\DateTime`
object. Excessive use of this functionality is not recommended, since you will
find you often do not need said field and hence just wasted processing time.

### `Schematic` interface

The schematic interface is composed of actions that are performed to push the
database schema up. There is no support for dropping the database down, beyond
uninstalling everything. The reason for this is because returning to a previous
state should be implemented as simply a more advanced state that is identical
to the desired earlier state. This ensures no data is lost because you are
forced to convert the data back.

The operations specified by a schematic are:

 * `down`, drop a database (removing columns or renaming tables should be
   in `move`)
 * `up`, this action is designed for creating new tables
 * `move`, this action is designed for any changes to tables
 * `bind`, any change related to constraints
 * `build`, any operation that involves populating the database

### `Marionette*` interfaces

The `Marionate` interface is designed as a base interface for `MarionetteModel`
and `MarionetteCollection`, among others.

The `MarionetteCollection` interface is designed for use in APIs. To facilitate
this it provides methods that correspond to a REST structure (ie. `get`, `put`,
`post`, `delete`).

The `MarionetteModel` interface is designed for use in APIs. As the collection
equivalent, it provides an API based on REST.

Following the marionette design, the implementation of `Marionette*` classes
should not contain any non-REST operations.

Since the `Marionette` interfaces are designed to emulate REST, injecting custom
methods for performing tasks is not compatible, so any functionality should
be implemented though drivers, via the `MarionetteDriver` interface. The
interface provides the following:

 * `compile`, performed on POST, you should resolve input dependencies;
   operation will happen before validation

 * `latecompile`, similar to `compile` only it is preformed after the the entry
   has been created; this operation is designed for tasks that require the
   entry to have an id such as associating tags to an entry

 * `compilefields`, manipulates field list before database insertion happens

 * `inject`, is performed on GET and works by alterning the query execution
   plan before it's executed (ie. joins, fields, postprocessors, etc)

Several misc setters are also provided.
