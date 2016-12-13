<?php

namespace App\Repositories\Voucher;

interface VoucherRepositoryInterface
{
    /**
     * Get all voucher
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new voucher
     *
     * @param array $inputs [values input text]
     *
     * @return voucher
     */
    public function create($inputs);

    /**
     * Find a voucher
     *
     * @param int $id [id of voucher update]
     *
     * @return voucher
     */
    public function find($id);

    /**
     * Update a voucher
     *
     * @param array $inputs [values input text]
     * @param int   $id     [id of voucher]
     *
     * @return boolean
     */
    public function update($inputs, $id);

    /**
     * Delete a voucher
     *
     * @param int $id [id of voucher delete]
     *
     * @return boolean
     */
    public function delete($id);
}
