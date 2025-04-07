<?php

    // Enum "Account" pour la classe "BankAccount"
    enum Account {
        case courant;
        case epargne;

        public function toString(): string {
            return match($this) {
                self::courant => "Compte courant",
                self::epargne => "Compte épargne"
            };
        }

        public static function toEnum(string $typeA): Account {
            return match($typeA) {
                "Compte courant" => self::courant,
                "Compte épargne" => self::epargne,
                default => throw new InvalidArgumentException("Compte invalide: $typeA")
            };
        }
    }

    // Enum "Contract" pour la classe "Contract"
    enum Contract {
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

        public static function fromString(string $typeC): Contract {
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
?>
