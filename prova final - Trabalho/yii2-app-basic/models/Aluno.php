<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id
 * @property integer $matricula
 * @property string $nome
 * @property string $sexo
 * @property integer $id_curso
 * @property integer $ano_ingresso
 *
 * @property Curso $idCurso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'id_curso', 'ano_ingresso'], 'integer'],
            [['matricula', 'id_curso', 'ano_ingresso', 'nome', 'sexo'],'required', 'message' => "este campo é de preenchimento obrigatorio"],
            [['nome'], 'string', 'max' => 200],
            [['sexo'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matrícula',
            'nome' => 'Nome Completo',
            'sexo' => 'Sexo',
            'id_curso' => 'Curso de Graduação',
            'ano_ingresso' => 'Ano de Ingresso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    public function afterFind ()
    {
        $this->nome = ucwords(strtolower($this->nome)); //letra INICIAL maiuscula

        if ($this->sexo == "F"){ //transforma F e M em feminino e masculino
            $this->sexo = "Feminino";
        }
        else{
            $this->sexo = "Masculino";   
        }
        //transforma 1 em ciencia da comp... / 2 em sistema de info / 3 eng comp.
        if ($this->id_curso == 1){
            $this->id_curso = "Ciência da Computação";
        }
        else if($this->id_curso == 2){
            $this->id_curso = "Sistema de Informação";
        } 
        else {
            $this->id_curso = "Engenharia da Computação";
        }



    }

}
?>