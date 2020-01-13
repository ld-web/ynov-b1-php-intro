<?php
/**
 * Retourne vrai si l'âge est au-dessus de la majorité
 *
 * @param integer $age
 * @return boolean
 */
function majeur(int $age): bool
{
  return $age >= AGE_MAJORITE;
}
