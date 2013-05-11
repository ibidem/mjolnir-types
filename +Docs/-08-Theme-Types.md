The theming system is defined by `Theme` objects that are used by
`ThemeLoader`s for integrating themes in the request, `ThemeDriver`s
responsible for handling theme specific requests and `ThemeViews` responsible
for rendering themed view-based content.

### `Theme` interface

A `Theme` object is a `Channeled Meta` object with various specialized
accessors and setters, namely:

 * `themename_*`/`themename` for retrieving and setting the theme name
 * `themepath_*`/`themepath` for retrieving and setting the theme path
 * `themeview` for creating `ThemeView` objects based on the theme

### `ThemeDriver` interface

A `ThemeDriver` object is responsible for non-view theme requests (eg. css
files, resource files, etc). A theme drivers is merely a
`Channeled Renderable Resetable Recoverable` composite.

The point of theme drivers is to allow for support of both different languages
(mjolnir for example has support for dart), but also alternative handling and
build patterns, ie. supporting a specific compiled language, or resource files,
etc.

### `ThemeLoader` interface

A `ThemeLoader` object is responsible for the most part integrating
`ThemeDriver`s and other dependencies into the request, as specified by the
theme configuration.

A theme loader is merely a `Meta Channeled Executable` composite.

### `ThemeView` interface

A `ThemeView` object is a `Channeled View` (note: `View` is `FileBased`), with
a few theme specific additions.

 * `themepath_*`/`themepath` for retrieving the theme path
 * `partial` for retrieving a sub view in the same theme
 * `resource` for retrieving a file URL, a resource driver/loader is assumed to
   be provided by the implementation (albeit not internally)

Implementations may provide additional utalitarian methods. As an example,
`mjolnir\theme\ThemeView` provides a `headinclude` and `footerinclude` for
injecting code in the head of the page and right in the last part of the body
respectably for cases where a HTML layer is used and hence the theme doesn't
have direct control over those parts with out said methods.