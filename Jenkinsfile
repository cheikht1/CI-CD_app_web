pipeline {
    agent any
    environment {
        DOCKER_COMPOSE_VERSION = '1.29.2'
        DOCKER_IMAGE1 = "apache_ct"
        DOCKER_TAG1 = "latest"
        DOCKER_IMAGE2 = "mysql_ct"
        DOCKER_TAG2 = "latest"
    }
    stages {
        stage('Terraform') {
            steps {
                dir('Terraform') {
                    script {
                        // Lancement de Terraform
                        bat 'terraform --version'
                        bat 'terraform init'
                        bat 'terraform plan'
                        bat 'terraform apply --auto-approve'
                        // bat 'terraform destroy --auto-approve'
                    }
                }
            }
        }
        stage('SonarQube Analysis') {
            steps {
                script {
                    withSonarQubeEnv('SonarQube') { // Assurez-vous que SonarQube est configuré dans Jenkins
                        bat """
                            sonar-scanner -Dsonar.projectKey=app_web_aws ^
                                           -Dsonar.sources=. ^
                                           -Dsonar.host.url=http://localhost:9000 ^
                                           -Dsonar.login=sqp_04291615156b6d9a8778ef8d3241f2754e2f7114
                        """
                    }
                }
            }
        }
    }
    post {
        success {
            slackSend channel: '#projetdevops', message: 'Build réussi'
        }
        failure {
            slackSend channel: '#projetdevops', message: 'Build échoué'
        }
    }
}































// pipeline {
//     agent any
//     environment {
//         DOCKER_COMPOSE_VERSION = '1.29.2'
//         DOCKER_IMAGE1 = "apache_ct"
//         DOCKER_TAG1 = "latest"
//         DOCKER_IMAGE2 = "mysql_ct"
//         DOCKER_TAG2 = "latest"
//     }
//     stages {
//         // stage('Cree les fichiers Image Docker') {
//         //     steps {
//         //         script {
//         //             bat "docker --version" // Vérifier que Docker est accessible
//         //             // Lancement de Docker Compose
//         //             bat "docker build -t ${DOCKER_IMAGE2}:${DOCKER_TAG1} -f Db.Dockerfile ."
//         //             bat "docker build -t ${DOCKER_IMAGE1}:${DOCKER_TAG2} -f Web.Dockerfile ."
//         //         }
//         //     }
//         // }
//         // stage('publier les images Docker') {
//         //     steps {
//         //         script {
//         //             bat "docker login -u cheikht -p m6rZ.uGUKpTXWkq"
//         //             // Mettez ici vos commandes pour pousser
//         //             bat "docker tag ${DOCKER_IMAGE1}:${DOCKER_TAG1} cheikht/${DOCKER_IMAGE1}:${DOCKER_TAG1}"
//         //             bat "docker push cheikht/${DOCKER_IMAGE1}:${DOCKER_TAG1}"
//         //             bat "docker tag ${DOCKER_IMAGE2}:${DOCKER_TAG2} cheikht/${DOCKER_IMAGE2}:${DOCKER_TAG2}"
//         //             bat "docker push cheikht/${DOCKER_IMAGE2}:${DOCKER_TAG2}"
//         //         }
//         //     }
//         // }
// //         stage('Deployer sur Kubernetes') {
// //         steps {
// //         withCredentials([file(credentialsId: 'kubeconfig', variable: 'KUBECONFIG')]) {
// //             script {
// //                 // Déployer sur Kubernetes
// //                 bat "kubectl apply -f db_web_deploy_serv.yml --kubeconfig=%KUBECONFIG% --validate=false"
// //             }
// //         }
// //     }
// // }
//       stage('Terraform') {
//             steps {
//                 dir('terraform') {
//                     script {
//                         // Lancement de Terraform
//                         bat 'terraform --version'
//                         // bat 'terraform init'
//                         bat 'terraform plan'
//                         bat 'terraform apply --auto-approve'
//                         // bat 'terraform destroy --auto-approve'
//                     }
//                 }
//             }
//         }

//     }
//     post {
//         success {
//            // bat 'docker-compose down -v'
//             slackSend channel: '#projetdevops', message: 'Build réussi'
//         }
//         failure {
//             slackSend channel: '#projetdevops', message: 'Build échoué'
//         }
//     }
// }
