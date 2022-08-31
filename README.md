### DevOps_ansible_terraform_packer_project
Este repositório tem como finalidade armazenar o trabalho final da disciplina de DevOps, ocorrida em 2022.

## Projeto Final
O projeto tem como objetivo subir uma AMI no serviço da AWS por meio de uma instância do EC2 que terá o aplicativo web pré-configurado
e pronto para uso. Para realizar a tarefa, foi exigido utilizar as ferramentas Packer, Ansible e Terraform. Neste projeto:
* O Packer é responsável por subir uma AMI temporária na AWS de acordo com as especificações no arquivo application.yml, que pode 
ser encontrado dentro da pasta Ansible. 
* O Ansible contém as especificações necessárias para o funcionamento da arquitetura (exemplo: instala Nginx, php, concede permissões,
etc). 
* O Terraform é responsável por subir a AMI final na conta AWS, criando um grupo de segurança que contém todos os privilégios.

## Como executar o projeto

### Passo 1
Se estiver utilizando Windows, instale o WSL (Windows Subsystem for Linux ou na tradução Subsistema do Windows para Linux) antes de
iniciar este projeto. O WSL permite que seja utilizado um sistema Linux dentro do Windows. Os comandos listados a seguir só funcionarão 
em Linux (ou WSL). Para este projeto, é necessário ter conta na AWS, com chaves geradas e usuário criado. Verificar documentação ou
tutoriais para verificar como realizar este procedimento.

### Passo 2
Inicializar o WSL no terminal do Windows. Para isso, digite o comando 'wsl' (sem aspas) no cmd.

### Passo 3
Entre na pasta \\wsl$\Ubuntu\home\(SEU NOME DE USUARIO)\Project\ e coloque o projeto dentro da pasta Project. Se a pasta não existir, crie.

### Passo 4
Para este projeto, utilizei o editor de código-fonte Visual Studio Code que vem embutido com um terminal. Abra o projeto no Visual 
Studio Code. Após isso, abra o terminal dentro da própria ferramenta (por padrão, o comando é ctrl+shift+') e digite 'wsl' (sem aspas)
para iniciar o serviço.

### Passo 5
Instalar as ferramentas Ansible, Terraform e Packer no próprio terminal. Procurar a respectiva documentação de cada ferramenta para
realizar a instalação.

### Passo 6
Confirme se as ferramentas estão instaladas. Para tal, digite no terminal 'terraform' (sem aspas) para averiguar se o Terraform foi 
instalado. Digite no terminal 'ansible' para averiguar se o Ansible foi instalado. Digite no terminal 'packer' (sem aspas) para 
averiguar se o Packer foi instalado.

### Passo 7
Após a instalação das ferramentas, no terminal do VS Code, entre na pasta onde está localizado o projeto. Exemplo, no meu caso o comando 
para entrar na pasta seria:
**cd \\wsl$\Ubuntu\home\brendamoura\Project\Devops_trabalhoFinal** 

### Passo 8
Configure o **AWS CLI** no seu terminal com suas credenciais (chave privada, chave pública, sua zona (exemplo: us-east-1))

### Passo 9
Dentro do arquivo **var.tf**, coloque sua chave de acesso pública dentro de "default" na variável **aws_access_key**. Coloque sua chave de
acesso privada dentro de "default" na variável **aws_secret_key**.

### Passo 10
Dentro do terminal do VS Code, entre na pasta Packer (comando: **cd packer** ) e execute os seguintes comandos em ordem:
* packer init .
* packer fmt .
* packer validate .
* packer build .

### Passo 11
Busque a AMI criada na AWS. Na sessão EC2 da AWS, clique no botão "Launch Instances", procure "My AMIs", selecione a AMI criada pelo 
Packer/Ansible e copie o nome da AMI (Exemplo: ami-0a955a9ff94cc3657). No arquivo var.tf, cole o nome da sua AMI na variável ami_id

### Passo 12
Volte para a pasta raiz do projeto com o comando **cd ../** e execute os seguintes comandos no terminal do VS Code:
* terraform init
* terraform apply

### Passo 13
Após executar o terraform, subirão instâncias na AWS. Clique na instância de nome Web, nela deve conter o site em PHP funcional.

