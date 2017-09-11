# Criar banco de dados

Criar
./vendor/bin/doctrine-module orm:schema-tool:create

Update
./vendor/bin/doctrine-module orm:schema-tool:update --force

Apagar
./vendor/bin/doctrine-module orm:schema-tool:drop

Criar entidades (Atenção, informar o modulo onde serão geradas as entidades)
./vendor/bin/doctrine-module  orm:generate:entities dump/

Criar repositorios (Atenção, informar o modulo onde serão gerados os repositórios)
./vendor/bin/doctrine-module  orm:generate:repositories  dump/
