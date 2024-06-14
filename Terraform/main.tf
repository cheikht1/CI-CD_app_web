provider "kubernetes" {
  config_path = "C:/Users/bmd tech/.kube/config" //"~/.kube/config"
}
resource "kubernetes_manifest" "deployment_web" {
  manifest = yamldecode(file("../kubernetes/web_deploy.yml"))
}

resource "kubernetes_manifest" "deployment_db" {
  manifest = yamldecode(file("../kubernetes/db_deploy.yml"))
}

resource "kubernetes_manifest" "db-service" {
  manifest = yamldecode(file("../kubernetes/db_services.yml"))
}
resource "kubernetes_manifest" "web-service" {
  manifest = yamldecode(file("../kubernetes/web_services.yml"))
}