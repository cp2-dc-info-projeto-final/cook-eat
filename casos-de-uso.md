# Documento de Casos de Uso

## Lista dos Casos de Uso

 - FLUXOS PRINCIPAIS E ALTERNATIVOS DE CASOS DE USO
 - FLUXOS PRINCIPAIS E ALTERNATIVOS DE LOGOUT
 - FLUXOS PRINCIPAIS E ALTERNATIVOS PARA EDITAR USUÁRIO
 - FLUXOS PRINCIPAIS E ALTERNATIVOS PARA EDITAR POSTAGEM
 - FLUXOS PRINCIPAIS E ALTERNATVOS PARA EXCLUIR PUBLICAÇÃO

## Lista dos Atores

 - Cras tempor
 - Donec a lorem

## Diagrama de Casos de Uso

![Diagrama de Casos de Uso](diagrama-exemplo.png)

## Descrição dos Casos de Uso

### Fluxos Principais e Alternativos do Caso de Uso

**Fluxo Principal**

1. O sistema apresenta um formulário com os campos username e senha 
2. O usuário insere seu username e sua senha e clica no botão “Enviar” 
3. O sistema valida o username e a senha do usuário
4. O sistema encaminha o usuário para sua tela inicial 

**Fluxo Alternativo A **
1. O sistema apresenta um formulário com os campos username e senha
2. O usuário insere seu username e sua senha e clica no botão “Enviar”
3. O sistema informa que ousername é invalido 
4. O usuário corrige as informações de username e senha e clica no botão “Enviar”
5. O sistema encaminha o usuário para sua tela inicial

**Fluxo Alternativo B**

1. O sistema apresenta um formulário com os campos username e senha 
2. O usuário clica no botão “Ainda não é cadastrado?” 
3. O usuário informa username, e-mail, senha e confirmar senha através de um formulário e clica em “Cadastrar” 
4. O sistema válida e encaminha para a pagina de login 
  
  
**Fluxo Alternativo C**

1. O sistema apresenta um formulário com os campos username e senha 
2. O usuário insere informações inválidas 
3.  O sistema não reconhece o login e encaminha o usuário para uma página que contém os requisitos necessários para efetuar o cadastro


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


### Fluxos Principais e Alternativos para editar postagem 

 

**Fluxo principal ** 

  1-Ao clicar na barra de navegação o sistema apresenta um botão escrito “adm” 

  2-O sistema permite o acesso ao autor 

  3-O usuário escolhe a opção de editar a publicação  

  4-O administrador altera a postagem e salva  

  5-O sistema atualiza a publicação  

 

 **Fluxos Alternativos 1** 
 
  1-O usuário aperta em salvar  

  2- O sistema não lê o comando e a publicação não salva  

  3- O usuário atualiza a página e faz o mesmo procedimento do fluxo principal   

 

 ### Fluxos Principais e Alternativos para excluir postagem  

 
**Fluxo principal** 

  1- O sistema apresenta uma barra de navegação  

  2- Ao clicar na barra de navegação o sistema apresenta um botão escrito “adm” 

  3- O sistema permite o acesso ao autor e ao administrador   

  4- O usuário escolhe a opção de excluir postagem 

  5- O sistema lê o comando e a publicação some do feed e do perfil do autor 

 
**Fluxo Alternativo 1**

  1- O usuário aperta em excluir  

  2- O sistema não lê o comando e a publicação não é removida da rede social 

  3- O usuário atualiza a página e faz o mesmo procedimento do fluxo principal  

     

 ###FLUXOS PRINCIPAIS E ALTERNATIVOS PARA EXIBIR A TIMELINE DO USUÁRIO 
      
** Fluxo principal** 

  1-O usuário clica na barra de navegação e o sistema apresenta um ícone de pesquisas 

  2-Ao clicar para pesquisar, o  usuário vai inserir a palavra chave do perfil que ela deseja encontrar 

  3-Realizado a busca, o autor vai encontrar todas as postagens do usuário na rede social. 


** Fluxo alternativo 1**

  1- O usuário vai tentar realizar a busca 
 
  2- E a palavra chave não vai estar correta 

  3- O sistema vai da opções de perfis com a palavra chave pesquisada 

** Fluxo Alternativo 2**

  1-O usuário vai tentar realizar a busca com a palavra chave
  
  2-O sistema não encontra o usuário 
  
  3-O autor atualiza a rede social e faz o mesmo procedimento do fluxo principal
