terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 3.0"
    }
  }
}

provider "aws" {
  region     = "us-east-1"
  access_key = var.aws_access_key
  secret_key = var.aws_secret_key
}

resource "aws_instance" "maquina_wp" {
  count         = 2
  disable_api_termination      = false
  ami           = var.ami_id
  instance_type = "t2.micro"
  key_name      = "terraform-key"
  tags = {
    Name = "${element(var.instance_names, count.index)}"
    #Name = "ansible"
  }
  vpc_security_group_ids = ["${aws_security_group.acesso_geral.id}"]

}

