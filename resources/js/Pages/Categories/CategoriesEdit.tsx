import PageContainer from "@/Components/PageContainer";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {PageProps} from "@/types";
import {Category, SubCategoryCreate} from "@/types/categories/category";
import {Head, router, useForm} from "@inertiajs/react";
import {BaseSyntheticEvent} from "react";
import {CategoryEditCard} from "./components/CategoryEditCard";
import {Routes} from "@/types/routes";
import {SubCategoriesEditCard} from "./components/SubCategoriesEditCard";

interface CategoriesEditProps extends PageProps {
    category: Category;
}

export default function CategoriesEdit({
    auth,
    category,
}: CategoriesEditProps) {
    const { put, data, setData, errors, processing } = useForm({
        name: category.name,
        description: category.description ?? "",
        subCategories: category.sub_categories as SubCategoryCreate[],
        category_id: category.id,
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        put(route("categories.update", category.id), {
            preserveScroll: true,
            onSuccess: () => router.visit(route("categories.index")),
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Edit Category", backButton: Routes.CATEGORIES }}
        >
            <Head title="Edit Category" />

            <PageContainer>
                <form onSubmit={submit} method="put" className="space-y-6">
                    <CategoryEditCard
                        heading="Edit Category"
                        nameValue={data.name}
                        nameError={errors.name}
                        onChangeName={(name) => setData("name", name)}
                        descriptionValue={data.description}
                        descriptionError={errors.description}
                        onChangeDescription={(description) =>
                            setData("description", description)
                        }
                    />

                    <SubCategoriesEditCard
                        subCategories={data.subCategories}
                        errors={errors.subCategories}
                        onChange={(subCategories) =>
                            setData("subCategories", subCategories)
                        }
                    />

                    <PrimaryButton disabled={processing}>Update</PrimaryButton>

                    <input
                        type="hidden"
                        name="category_id"
                        value={category.id}
                    />
                </form>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
