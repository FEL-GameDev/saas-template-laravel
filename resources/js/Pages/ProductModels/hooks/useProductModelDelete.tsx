import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import SecondaryButton from "@/Components/SecondaryButton";
import {Product} from "@/types/products/product";
import {useForm} from "@inertiajs/react";
import {FormEventHandler, useState} from "react";

export default function useProductModelDelete() {
    const [confirmingDeletion, setConfirmingDeletion] = useState(false);
    const [productModel, setProductModel] = useState<Product | undefined>(
        undefined
    );
    const [redirect, setRedirect] = useState<string | undefined>();

    function onClickDeleteProductModel(
        product: Product,
        redirect: string | undefined = undefined
    ) {
        setProductModel(product);
        setConfirmingDeletion(true);
        setRedirect(redirect);
    }

    function onCloseConfirmation() {
        setConfirmingDeletion(false);
        setProductModel(undefined);
    }

    const { delete: destroy, processing, errors } = useForm();

    const deleteCategory: FormEventHandler = (e) => {
        e.preventDefault();

        destroy(route("product.destroy", productModel?.id), {
            preserveScroll: true,
            onSuccess: onCloseConfirmation,
        });
    };

    function deleteProductModelConfirmation() {
        return (
            <Modal show={confirmingDeletion} onClose={onCloseConfirmation}>
                <form onSubmit={deleteCategory} className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        Delete {productModel?.name}
                    </h2>

                    <p className="mt-1 text-sm text-gray-600">
                        This action is permanent, all linked products will be
                        deleted.
                    </p>

                    <div className="mt-6"></div>

                    <div className="mt-6 flex justify-end">
                        <SecondaryButton onClick={onCloseConfirmation}>
                            Cancel
                        </SecondaryButton>

                        <DangerButton className="ml-3" disabled={processing}>
                            Delete
                        </DangerButton>
                    </div>
                </form>
            </Modal>
        );
    }

    return {
        onClickDeleteProductModel,
        deleteProductModelConfirmation: deleteProductModelConfirmation(),
    };
}
