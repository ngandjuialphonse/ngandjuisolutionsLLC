pipeline {
    agent any
    stages {
        stage('ECR Connection') {
            steps {
                sh 'aws ecr get-login-password --region us-east-1 | docker login --username AWS --password-stdin 737047471328.dkr.ecr.us-east-1.amazonaws.com'
            }
        }

        stage('Image Build') {
            steps {
                sh 'docker build -t alphonsedev .'
            }
        }

        stage('Tag Image') {
            steps {
                sh 'docker tag alphonsedev:latest 737047471328.dkr.ecr.us-east-1.amazonaws.com/alphonsedev:${BUILD_ID}'
            }
        }

        stage('Push Image') {
            steps {
                sh 'docker push 737047471328.dkr.ecr.us-east-1.amazonaws.com/alphonsedev:${BUILD_ID}'
            }
        }
        
        stage('Deploy to EKS') {
            steps {
                script {
                    withKubeConfig(credentialsId: 'eks_credential',) {
                        sh 'kubectl apply -f deployment.yaml' // Assuming your manifest file is named deployment.yaml
                    }
                }
            }
        }
    }
}
