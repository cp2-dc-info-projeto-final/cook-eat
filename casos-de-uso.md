# Documento de Casos de Uso

## Lista dos Casos de Uso

 - Fluxos principais e alternativos do Caso de uso (# Fluxos Principais e Alternativos do Caso de Uso
): Quisque id neque a erat imperdiet dictum et ut mauris.
 - [FLUXOS PRINCIPAIS E ALTERNATIVOS DE LOGOUT](#FLUXOS PRINCIPAIS E ALTERNATIVOS DE LOGOUT): Morbi fringilla dolor at mattis vestibulum.
 - [CDU 03](#CDU-03): Duis nec orci quis velit faucibus hendrerit tempus vel libero.


## Lista dos Atores

 - Cras tempor
 - Donec a lorem

## Diagrama de Casos de Uso

![Diagrama de Casos de Uso](diagrama-exemplo.png)

## Descrição dos Casos de Uso

### Fluxos Principais e Alternativos do Caso de Uso

**Fluxo Principal**

1. O sistema apresenta um formulário com os campos login e senha 
2. O usuário insere seu login e sua senha e clica no botão “Entrar” 
3. O sistema valida o login e a senha do usuário
4. O sistema encaminha o usuário para sua tela inicial 

**Fluxo Alternativo A **
1. O sistema apresenta um formulário com os campos login e senha
2. O usuário insere seu login e sua senha e clica no botão “Entrar”
3. O sistema informa que o login e a senha não coincidem
4. O usuário corrige as informações de login e senha e clica no botão “Entrar”
5. O sistema encaminha o usuário para sua tela inicial

**Fluxo Alternativo B**

1. O sistema apresenta um formulário com os campos login e senha 
2. O usuário clica no botão “Não possuo cadastro” 
3. O usuário informa nome e e-mail através de um formulário e clica em “Solicitar criação de conta” 
4. O sistema abre uma solicitação de criação de conta 
5. O sistema informa ao usuário que a solicitação de criação de conta foi feita e está em análise


### FLUXOS PRINCIPAIS E ALTERNATIVOS DE LOGOUT

**Fluxo Principal** 

1- O sistema apresenta uma barra no canto superior direito
2- O usuário clica em “sair”
3- O sistema valida o logout
4- O sistema encaminha para a tela principal

### FLUXOS PRINCIPAIS E ALTERNATIVOS PARA EDITAR USUÁRIO

**Fluxo Principal**

1- O sistema apresenta uma barra no canto superior direito
2- O usuário clica em “editar usuário”
3- O sistema abre uma solicitação de edição de usuário com a opção de “nome” e “senha”
4- O usuário troca o nome e a senha e clica na opção “salvar”
5- O sistema encaminha para a tela inicial

**Fluxo Alternativo A**

1- O sistema apresenta uma barra no canto superior direito
2- O usuário clica em “editar usuário”
3- O sistema abre uma solicitação de edição de usuário com a opção de “nome” e “senha”
4- O usuário troca o nome e clica em salvar
5- O sistema troca para o novo nome
6- O sistema valida e encaminha para a tela inicial

**Fluxo Alternativo B**
1- O sistema apresenta uma barra no canto superior direito
2- O usuário clica em “editar usuário”
3- O sistema abre uma solicitação de edição de usuário com a opção de “nome” e “senha”
4- O usuário troca a senha
5- O sistema troca para a nova senha
6- O sistema valida e encaminha para a tela inicia
