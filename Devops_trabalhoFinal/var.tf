
variable "aws_access_key" {
  default = ""
  sensitive = true
}
variable "aws_secret_key" {
  default = ""
  sensitive = true
}

variable "instance_names" {
  default = ["web", "thingsboard"]
}

variable "ami_id" {
  default = "ami-0a955a9ff94cc3657"
}

variable "domain" {
  default = ""
}
