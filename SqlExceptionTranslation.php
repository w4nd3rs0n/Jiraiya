<?php
/**
 * 
 */
class SqlExceptionTranslation extends Exception {
	/**
	 * @var unknown_type
	 */
	private static $prefix = '';
	#
	public static $ConnectionFailure = 'POSSÍVEIS CAUSAS DO ERRO: <br>Falha na Conexão com o Banco de Dados';
	public static $ForeignkeyViolation = 'POSSÍVEIS CAUSAS DO ERRO: <br>ESTE REGISTRO POSSUI RELACIONAMENTOS PENDENTES, PORTANTO NÃO PODE SER CRIADO, ALTERADO OU DELETADO';
	public static $NumericValueOutOfRange = 'POSSÍVEIS CAUSAS DO ERRO: <br/><br/NÚMERO INVÁLIDO PARA REGISTRO.';
	public static $ColumnCannotAcceptANullValue = 'POSSÍVEIS CAUSAS DO ERRO: <br/><br/CAMPO REQUERIDO NÃO PREENCHIDO';
	public static $DuplicateKeyValueOnPrimaryKey = 'POSSÍVEIS CAUSAS DO ERRO: <br/><br/>O registro já existe; <br/>Algum campo foi escolhido mais de uma vez; <br/>Restrição de Unicidade';
	public static $InvalidTextRepresentation = 'POSSÍVEIS CAUSAS DO ERRO: <br/><br/>Entrada de Texto Inválido; ';
	public static $InsufficientPrivilege = 'Falha na Permissão de Acesso a Dados da Tabela';
	public static $CannotIdentifyAColumnToATable = 'POSSÍVEIS CAUSAS DO ERRO: <br/><br/ALGUMA COLUNA NÃO ESTÁ PRESENTE NA TABELA';
	public static $InvalidDatetimeFormat = 'POSSÍVEIS CAUSAS DO ERRO: <br/> DATA INVÁLIDA';
	public static $QueryCanceled = 'POSSÍVEIS CAUSAS DO ERRO: <br/> Consulta Cancelada';
	public static $SyntaxErrorOrAccessRuleViolation = 'POSSÍVEIS CAUSAS DO ERRO: <br/> Erro de sintaxe ou violação de regra de acesso';

	final public static function ReturnMessage($codigo) {
		switch ($codigo) {
			case '22003':
				return SqlExceptionTranslation::$NumericValueOutOfRange;
				break;

			case '23503':
				return SqlExceptionTranslation::$ForeignkeyViolation;
				break;

			case '23502':
				return SqlExceptionTranslation::$ColumnCannotAcceptANullValue;
				break;

			case '23505':
				return SqlExceptionTranslation::$DuplicateKeyValueOnPrimaryKey;
				break;

			case '42601':
				return SqlExceptionTranslation::$CannotIdentifyAColumnToATable;
				break;

			case '42501':
				return SqlExceptionTranslation::$InsufficientPrivilege;
				break;
				 
			case '22P02':
				return SqlExceptionTranslation::$InvalidTextRepresentation;
				break;

			default:
				return $codigo;
		}
	}

	final public static function ReturnExceptionMessage(Exception $exc) {
		switch ($exc->getCode()) {
			//Connection Exception
			case '08000':
			case '08003':
			case '08006':
			case '08001':
			case '08004':
			case '08007':
			case '08P01':
				return $exc->getCode()." ".SqlExceptionTranslation::$ConnectionFailure;
				break;
			
			//Syntax Error or Access Rule Violation
			case '42000':
			case '42846':
			case '42803':
			case '42P20':
			case '42P19':
			case '42830':
			case '42602':
			case '42622':
			case '42939':
			case '42804':
			case '42P18':
			case '42P21':
			case '42P22':
			case '42809':
			case '42703':
			case '42883':
			case '42P01':
			case '42P02':
			case '42704':
			case '42701':
			case '42P03':
			case '42P04':
			case '42723':
			case '42P05':
			case '42P06':
			case '42P07':
			case '42712':
			case '42710':
			case '42702':
			case '42725':
			case '42P08':
			case '42P09':
			case '42P10':
			case '42611':
			case '42P11':
			case '42P12':
			case '42P13':
			case '42P14':
			case '42P15':
			case '42P16':
			case '42P17':
				return $exc->getCode()." ".SqlExceptionTranslation::$SyntaxErrorOrAccessRuleViolation;
				break;
				
			case '22003':
				return SqlExceptionTranslation::$NumericValueOutOfRange;
				break;

			case '22007':
				return SqlExceptionTranslation::$InvalidDatetimeFormat;
				break;
				

			case '23503':
				return SqlExceptionTranslation::$ForeignkeyViolation;
				break;

			case '23502':
				return SqlExceptionTranslation::$ColumnCannotAcceptANullValue;
				break;

			case '23505':
				return SqlExceptionTranslation::$DuplicateKeyValueOnPrimaryKey;
				break;

			case '42601':
				return SqlExceptionTranslation::$CannotIdentifyAColumnToATable;
				break;
				 
			case '57014':
				return SqlExceptionTranslation::$QueryCanceled;
				break;
				 
			case '7':
				return SqlExceptionTranslation::$ConnectionFailure;
				break;
				 
			case '42501':
				return SqlExceptionTranslation::$InsufficientPrivilege;
				break;
				
			case '22P02':
				return SqlExceptionTranslation::$InvalidTextRepresentation;
				break;
			default:
				return 'DESCONHECIDO. COD '.$exc->getCode().'. MENSAGEM: '.$exc->getMessage();
		}
	}
}
?>