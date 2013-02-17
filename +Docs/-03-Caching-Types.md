Caching consists of a main type `Cache` and two subtypes `Stash`
and `TaggedStash`. The `Cache` type is merely a composite of the two.

The `Stash` consists of basic access methods: `get` and `set`, which function
the same as the `Meta` type with the only exception that `set` also accepts an
`expires` parameter.

In addition there is also a `delete` method for explicitly removing a key, and
a `flush` method for deleting all keys.

A basic example,

	// set a key with a value and keep the value for at most 60 minutes
	$cache->set('my_key', 'my_value', 3600);

	// you can omit expires to just use the default
	$cache->set('my_key', 'my_value');

	// retrieve the value
	$some_var = $cache->get('my_key');

	// by default if not set you will get null, you can configure this though
	// the 3rd parameter
	$some_var = $cache->get('some_key', 'some_default_value');

	// explicitly remove a key
	$cache->delete('my_key');

	// purge the cache of all keys
	$cache->flush();

The traits for `TaggedStash` will emulate the behaviour though the `Stash`
interface if not explicitly implemented.
