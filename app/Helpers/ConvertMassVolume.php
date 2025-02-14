<?php

namespace App\Helpers;




class ConvertMassVolume
{

  private array $densities = [
    'steel' => 7850,
    'water' => 1000,
    'air' => 1.225,
    'wood' => 700,
    'gold' => 19300,
    'aluminum' => 2700,
    'concrete' => 2400,
    'oil' => 850,
  ];

  function kgToM3(float $massKg, string $material = 'steel'): float
  {
    if (!array_key_exists($material, $this->densities)) {
      throw new \InvalidArgumentException("Material not found.");
    }

    if ($this->densities[$material] <= 0) {
      throw new \InvalidArgumentException("Density must be greater than zero.");
    }

    return $massKg / $this->densities[$material];
  }

  function m3ToKg(float $volumeM3, string $material = 'steel'): float
  {
    if (!array_key_exists($material, $this->densities)) {
      throw new \InvalidArgumentException("Material not found.");
    }

    if ($this->densities[$material] <= 0) {
      throw new \InvalidArgumentException("Density must be greater than zero.");
    }

    return $volumeM3 * $this->densities[$material];
  }
}
