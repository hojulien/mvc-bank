<?php

    // Enum "Account" pour la classe "BankAccount"
    enum EnumAccount {
        case courant;
        case epargne;

        public function toString(): string {
            return match($this) {
                self::courant => "Compte courant",
                self::epargne => "Compte épargne"
            };
        }

        public static function toEnum(string $typeA): EnumAccount {
            return match($typeA) {
                "Compte courant" => self::courant,
                "Compte épargne" => self::epargne,
                default => throw new InvalidArgumentException("Compte invalide: $typeA")
            };
        }
    }

    // Enum "Contract" pour la classe "Contract"
    enum EnumContract {
        case assurance_vie;
        case assurance_hab;
        case credit_immo;
        case credit_conso;
        case cel;

        public function toString(): string {
            return match($this) {
                self::assurance_vie => "Assurance Vie",
                self::assurance_hab => "Assurance Habitation",
                self::credit_immo => "Crédit Immobilier",
                self::credit_conso => "Crédit à la Consommation",
                self::cel => "Compte Épargne Logement (CEL)"
            };
        }

        public static function toEnum(string $typeC): EnumContract {
            return match($typeC) {
                "Assurance Vie" => self::assurance_vie,
                "Assurance Habitation" => self::assurance_hab,
                "Crédit Immobilier" => self::credit_immo,
                "Crédit à la Consommation" => self::credit_conso,
                "Compte Épargne Logement (CEL)" => self::cel,
                default => throw new InvalidArgumentException("Contrat invalide: $typeC")
            };
        }
    }
    function isConnected() {
        if (isset($_SESSION['admin_id'])) {
            return true;
        }
        return false;
    }

    function redirect(string $action) {
        header('Location: ' . $action);
        exit;
    }

    function requireAdmin() {
        if (!isConnected()) {
            redirect("?action=no-access");
        }
    }
?>
