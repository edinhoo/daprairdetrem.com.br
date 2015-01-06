<?php
require_once "DAO.php";
require_once (dirname(__FILE__))."/../VO/Usuario.php";
require_once (dirname(__FILE__))."/../constantes.php";

class UsuarioDAO extends DAO{
	// Impede a gravacao de usuarios atraves deste metodo
    public function gravar($objeto) {
        return null;
    }

    // Implementar
    public function atualizar($objeto) {
        return null;
    }

    // Cria um novo usuario
    // Parametros:
    //  usuario: objeto da classe Usuario
    private function novoUsuario($usuario) {
		$this->conectar();
		$usuarioArray = array();
        
        $query = "INSERT INTO Usuarios (id_facebook, id_google, nome, sobrenome, genero, aniversario, 
                                        cidade, bairro, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      	$stmt = $this->conexao->prepare($query);
        
        $usuarioArray[0] = $usuario->getIdFacebook();
        $usuarioArray[1] = $usuario->getIdGoogle();
        $usuarioArray[2] = $usuario->getNome();
        $usuarioArray[3] = $usuario->getSobrenome();
        $usuarioArray[4] = $usuario->getGenero();
        $usuarioArray[5] = $usuario->getAniversario();
        $usuarioArray[6] = $usuario->getCidade();
        $usuarioArray[7] = $usuario->getBairro();
        $usuarioArray[8] = $usuario->getEmail();
        
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($usuarioArray);
            $objeto->setId($this->conexao->lastInsertId());
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        } 
        
        //$id_usuario = $this->retornarIdUsuario($usuario->getIdGoogle(), $usuario->getIdFacebook());
        $id_usuario = $objeto->getId();

        $query = "INSERT INTO Papeis (id_usuario, id_permissao) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($query);

        $permissoesArray = array();

        $permissoesArray[0] = $id_usuario;
        $permissoesArray[1] = PERMISSAO_USUARIO;  

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($usuarioArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        } 
        return $objeto;
	}
    
    // Impede a exclusao de usuarios
    public function excluir($id, $tipo_id, $tabela) {
        return null;
    }

    // Altera o tipo do usuario
    public function alterarTipoUsuario($id_fonte, $id_alvo, $novo_tipo) {
        $permissoes_fonte = $this->retornarPermissoesUsuario($id_fonte);
        $permissoes_alvo = $this->retornarPermissoesUsuario($id_alvo);

        // Verifica o nivel hierarquico dos usuarios
        if (($permissoes_alvo[0] >= $permissoes_fonte[0]) || ($novo_tipo >= $permissoes_fonte[0])) {
            return false;
        }

        // Verifica se o solicitante possui permissao para alteracao
        if (!$permissoes_fonte[8]) {
            return false;
        }

        $this->conectar();
        $query = "UPDATE Papeis SET id_permissao=? WHERE id_usuario=?";
        $stmt = $this->conexao->prepare($query);
        $permissoesArray = array();

        $permissoesArray[0] = $novo_tipo;
        $permissoesArray[1] = $id_alvo;
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($usuarioArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
    }

    // Realiza o login a partir do id_google ou id_facebook e retorna 
    // um objeto Usuario. Caso o usuario nao exista, cria uma nova
    // entrada
    // Parametros:
    //  usuario: objeto da classe Usuario 
    public function login($usuario) {
        $id_facebook = $usuario->getIdFacebook;
        $id_google = $usuario->getIdGoogle;


        if ($id_google === null && $id_facebook === null) {
            return null;
        }

        $this->conectar();
        
        if ($id_google === null) {
            $query = "SELECT * FROM Usuarios WHERE id_facebook=" . $id_facebook;
            foreach($this->conexao->query($query) as $linha) {
                $usuario->setId($linha[0]);
                $usuario->setNome($linha[3]);
                $usuario->setSobrenome($linha[4]);
                $usuario->setGenero($linha[5]);
                $usuario->setAniversario($linha[6]);
                $usuario->setCidade($linha[7]);
                $usuario->setBairro($linha[8]);
                $usuario->setEmail($linha[9]);
            }
            if ($usuario->getId() === null) {
                $usuario = $this->novoUsuario($usuario);
                /*
                $query = "SELECT id FROM Usuarios WHERE id_facebook=" . $id_facebook;
                foreach($this->conexao->query($query) as $linha) {
                    $usuario->setId($linha[0]); 
                }*/

            }
            return $usuario;
        }

        $query = "SELECT * FROM Usuarios WHERE id_google=" . $id_google;
        foreach($this->conexao->query($query) as $linha) {
            $usuario->setId($linha[0]);
            $usuario->setNome($linha[3]);
            $usuario->setSobrenome($linha[4]);
            $usuario->setGenero($linha[5]);
            $usuario->setAniversario($linha[6]);
            $usuario->setCidade($linha[7]);
            $usuario->setBairro($linha[8]);
            $usuario->setEmail($linha[9]);
        }

        if ($usuario->getId() === null) {
            $usuario = $this->novoUsuario($usuario);
            /*
            $query = "SELECT id FROM Usuarios WHERE id_google=" . $id_google;
            foreach($this->conexao->query($query) as $linha) {
                    $usuario->setId($linha[0]); 
            }
            */
        }
        return $usuario;
    }
	
}
?>