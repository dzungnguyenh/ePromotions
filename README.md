# ePromotions

Local checking:
```bash
./vendor/bin/phpcs --standard=phpcs.xml
```
#### PHPMD
- [Code Size Rules](http://phpmd.org/rules/codesize.html)
- [Controversial Rules](http://phpmd.org/rules/controversial.html)
- [Design Rules](http://phpmd.org/rules/design.html)
- [Naming Rules](http://phpmd.org/rules/naming.html)
 - ShortVariable except for `$id`, `$e`
- [Unused Code Rules](http://phpmd.org/rules/unusedcode.html)

Local checking:
```bash
./vendor/bin/phpmd app text phpmd.xml
```
