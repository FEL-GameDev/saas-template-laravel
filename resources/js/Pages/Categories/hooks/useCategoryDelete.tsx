import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import SecondaryButton from "@/Components/SecondaryButton";
import {Routes} from "@/types/routes";
import {useForm} from "@inertiajs/react";
import {FormEventHandler, useState} from "react";

export default function useCategoryDelete() {
    const [confirmingCategoryDeletion, setConfirmingCategoryDeletion] =
        useState(false);
    const [categoryId, setCategoryId] = useState<number | undefined>(undefined);
    const [redirect, setRedirect] = useState<string | undefined>();

    function onClickDeleteCategory(
        categoryId: number,
        redirect: Routes | undefined = undefined
    ) {
        setCategoryId(categoryId);
        setConfirmingCategoryDeletion(true);
        setRedirect(redirect);
    }

    function onCloseConfirmation() {
        setConfirmingCategoryDeletion(false);
        setCategoryId(undefined);
    }

    const { delete: destroy, processing } = useForm();

    const deleteCategory: FormEventHandler = (e) => {
        e.preventDefault();

        destroy(route("categories.destroy", categoryId), {
            preserveScroll: true,
            onSuccess: () => {
                onCloseConfirmation();
                redirect && route(redirect);
            },
        });
    };

    function deleteCategoryConfirmation() {
        return (
            <Modal
                show={confirmingCategoryDeletion}
                onClose={onCloseConfirmation}
            >
                <form onSubmit={deleteCategory} className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        Delete Category
                    </h2>

                    <p className="mt-1 text-sm text-gray-600">
                        This action is permanent, all linked products will
                        become uncategorized.
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
        onClickDeleteCategory,
        deleteCategoryConfirmation: deleteCategoryConfirmation(),
    };
}
